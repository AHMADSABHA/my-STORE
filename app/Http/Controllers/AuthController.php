<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('authentication.login');
    }
    public function authunticate(Request $request){
$request->validate([
    'email'=>['required','email'],
    'password'=>['required'],
]);
if (Auth::attempt([
    'email' => $request->post('email'),
    'password' => $request->post('password'),
])) {
    $request->session()->regenerate();

    return redirect()->intended('dashboard');
}

return back()->withErrors([
    'email' => 'Your email and password doesn`t match',
])->onlyInput('email');
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}

    }

