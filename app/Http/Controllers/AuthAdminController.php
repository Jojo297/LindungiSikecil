<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function index()
    {
        return view("admin.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Nama pengguna harus diisi',
            'password.required' => 'Kata sandi harus diisi',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.admin.dashboard')->with('sucess', 'Selamat datang');
        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.admin');
    }
}
