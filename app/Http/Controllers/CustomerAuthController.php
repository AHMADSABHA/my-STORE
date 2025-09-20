<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


     
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('customer.orders');
        }

        return back()->with('error', 'بيانات الدخول غير صحيحة');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function showRegistrationForm()
    {
        return view('authentication.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
            'profession' => 'required|string|max:30',
            'phone' => 'required|numeric|min:8',
            'address' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            'image' => 'nullable|image|max:2048',
        ]);
$userData = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'profession' => $request->profession,
        'phone' => $request->phone,
        'address' => $request->address,
        'role' => $request->role,
    ];

    if ($request->hasFile('image')) {
        $userData['image'] = $request->file('image')->store('images', 'public');
    }

    $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'تم التسجيل بنجاح');
    }
}
