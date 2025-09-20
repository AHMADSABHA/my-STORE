<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // تحديث دور المستخدم
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:customer,salesman',
        ]);
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();
        return back()->with('success', 'تم تحديث دور المستخدم بنجاح.');
    }
}
