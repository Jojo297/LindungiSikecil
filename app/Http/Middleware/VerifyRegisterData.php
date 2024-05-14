<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyRegisterData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // cek apakah ada data di sesi agar ada hak akses ke input
        if (session('register_data') == null) {
            // Jika tidak ada, redirect ke halaman login
            return redirect()->route('login');
        }

        // Jika ada, lanjutkan ke halaman verifikasi OTP
        return $next($request);
    }
}
