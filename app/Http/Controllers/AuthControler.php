<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthControler extends Controller
{
    public function proseslogin(Request $request)
    {
        // $password = '123';
        // $hashedPassword = Hash::make($password);
        // echo $hashedPassword;

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard')->with(['success' => 'Selamat datang ' . Auth::guard('user')->user()->nama_user]);
        } else {
            if (empty($request->email) && empty($request->password)) {
                return redirect('/')->with(['warning' => 'Email dan Password Harus Diisi']);
            } elseif (empty($request->email)) {
                return redirect('/')->with(['warning' => 'Email Harus Diisi']);
            } elseif (empty($request->password)) {
                return redirect('/')->with(['warning' => 'Password Harus Diisi']);
            } else {
                return redirect('/')->with(['warning' => 'Email atau Password Salah']);
            }
        }
    }

    public function proseslogout(Request $request)
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
            return redirect('/');
        }
    }
}
