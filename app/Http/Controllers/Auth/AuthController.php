<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login.index');
    }
    
    public function show(){
        $role = auth()->user()->role;
        return view('login.show', compact('role'));
    }

    public function login(Request $request)
    {
       $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
       ]);

        $remember = $request->has('remember');

       if(Auth::attempt($credentials, $remember)){
        $request->session()->regenerate();

        return redirect()->intended('/' . auth()->user()->role);
       }

       return back()->withErrors([
        'username' => 'Username Atau Password Salah'
       ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
