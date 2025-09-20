<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BalanceTopupRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BalanceTopupRequestController extends Controller
{
    public function index()
    {
        $requests = BalanceTopupRequest::with('user')->orderBy('created_at', 'desc')->paginate(3);
        return view('dashboard-pages.balance.topup-requests', compact('requests'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);
        $topup = BalanceTopupRequest::findOrFail($id);
        $oldStatus = $topup->status;
        $topup->status = $request->status;
        $topup->added_to_balance = $topup->added_to_balance ?? 0;
        $topup->save();

        // تحقق من وجود أي طلب آخر بنفس رقم الإيصال مقبول (غير هذا الطلب)
        $alreadyApproved = BalanceTopupRequest::where('payment_receipt', $topup->payment_receipt)
            ->where('status', 'approved')
            ->where('id', '!=', $topup->id)
            ->exists();

        if ($request->status === 'approved') {
            // إذا كان هناك طلب آخر بنفس رقم الإيصال مقبول، لا تضف الرصيد أبداً
            if ($alreadyApproved) {
                Log::warning('Duplicate receipt: topup id '.$topup->id.' receipt '.$topup->payment_receipt);
                return back()->with('error', 'تمت إضافة رصيد لهذا رقم الإيصال مسبقاً ولا يمكن تكرار العملية.');
            }
            // إذا لم تتم إضافة الرصيد لهذا الطلب من قبل، أضف الرصيد
            if (!$topup->added_to_balance) {
                $user = \App\Models\User::find($topup->user_id);
                if ($user) {
                    $user->balance += $topup->amount;
                    $user->save();
                    DB::table('balance_topup_requests')->where('id', $topup->id)->update(['added_to_balance' => 1]);
                    Log::info('Balance added for user '.$user->id.' amount '.$topup->amount.' by topup id '.$topup->id);
                    $topup->refresh();
                } else {
                    Log::error('User not found for topup id: '.$topup->id);
                    return back()->with('error', 'المستخدم غير موجود.');
                }
            }
        }
        return back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }
}
