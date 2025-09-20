<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalanceTopupRequest;
use Illuminate\Support\Facades\Auth;

class BalanceChargeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'payment_link' => 'required|string',
            'currency' => 'required|string',
            'amount' => 'required|numeric',
            'payment_receipt' => 'required|string',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        BalanceTopupRequest::create($data);

        return redirect()->back()->with('success', 'تم إرسال طلب الشحن بنجاح، سيتم مراجعته من قبل الإدارة.');
    }
}
