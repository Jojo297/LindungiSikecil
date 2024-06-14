<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthParentsController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Anda belum mengisi email!',
            'email.email' => 'Masukkan dengan format email!',
            'password.required' => 'Anda belum mengisi kata sandi!',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // if (Auth::guard('parents')->attempt($data)) {
        //     dd('Login successful');
        //     return redirect()->route('user.dashboard');
        // }
        $parents = Auth::guard('parent')->attempt($data);
        // dd($parents);
        if ($parents == true) {
            // Redirect to user dashboard route    
            // dd('success');
            return redirect()->route('user.dashboard')->with('success', 'Berhasil Masuk, Selamat datang👋');
        } else {
            // Handle failed login attempts (optional)
            return  redirect()->back()->with('error', 'Email atau Kata sandi salah!');
        }
    }

    public function logout()
    {
        Auth::guard('parent')->logout();
        return redirect()->route('login');
    }

    public function indexDashboard()
    {
        return view('dashboard');
    }
}
