<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserBalanceController extends Controller
{
    public function index()
    {
        $users = User::paginate(3);
        return view('dashboard-pages.users.balance', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'balance' => 'required|numeric|min:0',
        ]);
        $user = User::findOrFail($id);
        $user->balance = $request->balance;
        $user->save();
        return redirect()->route('dashboard.users.balance')->with('success', 'تم تحديث الرصيد بنجاح');
    }
    public function charge()
    {
        return view('balance.charge');
    }
}
