<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('cart.checkout');
    }

    public function show()
    {
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();
        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $shipping = 3;
        $total = $subtotal + $shipping;

        return view('cart.checkout', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function store(Request $request)
{
    $paymentMethod = $request->input('payment_method');
    $user = User::find(auth()->id());

    if ($paymentMethod === 'shipping') {
        $data = $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name'  => 'required|string|max:25',
            'address'    => 'required|string|max:255',
            'city'       => 'required|string|max:30',
            'country'    => 'required|string|max:20',
            'phone'      => 'required|numeric|min:8',
            'email'      => 'required|email|max:50',
            'notes'      => 'nullable|string',
        ]);
    } elseif ($paymentMethod === 'online') {
       $data = [
    'first_name' => $user->first_name ?? 'غير معروف',
    'last_name'  => $user->last_name ?? 'غير معروف',
    'address'    => $user->address ?? 'غير معروف',
    'city'       => $user->city ?? 'غير معروف',
    'country'    => $user->country ?? 'غير معروف',
    'phone'      => $user->phone ?? '0000000000',
    'email'      => $user->email ?? 'noemail@example.com',
    'notes'      => null,
];
    } else {
        return back()->with('error', 'طريقة الدفع غير معروفة');
    }
    
    $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();
    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'السلة فارغة');
    }

    $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
    $shipping = ($paymentMethod === 'shipping') ? 3 : 0; // لا شحن عند أونلاين
    $total = $subtotal + $shipping;

    $user = User::find(auth()->id());
    if ($user->balance < $total) {
        return back()->with('error', 'رصيدك غير كافٍ لإتمام عملية الشراء.');
    }

    DB::beginTransaction();
    try {
        $order = Order::create([
            'user_id'    => $user->id,
            'first_name' => $data['first_name'] ?? $user->first_name,
            'last_name'  => $data['last_name'] ?? $user->last_name,
            'address'    => $data['address'] ?? $user->address,
            'city'       => $data['city'] ?? $user->city,
            'country'    => $data['country'] ?? $user->country,
            'phone'      => $data['phone'] ?? $user->phone,
            'email'      => $data['email'] ?? auth()->user()->email,
            'notes'      => $data['notes'] ?? null,
            'total'      => $total,
            'shipping'   => $shipping,
            'status'     => 'completed',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $item->product_id,
                'product_name' => $item->product->name,
                'price'        => $item->product->price,
                'quantity'     => $item->quantity,
                'subtotal'     => $item->product->price * $item->quantity,
            ]);
        }

        // خصم الرصيد
        $user->balance -= $total;
        $user->save();

        // حذف السلة بعد الطلب
        CartItem::where('user_id', $user->id)->delete();

        DB::commit();
        return redirect()->route('home')->with('success', 'تم إرسال الطلب بنجاح وتم خصم المبلغ من رصيدك.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'حدث خطأ أثناء معالجة الطلب'. $e->getMessage());
    }
}

}
