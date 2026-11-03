<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoleSeller
{
    public function handle(Request $request, Closure $next): Response
    {
        // 🟢 Cek apakah pengguna sudah login dan memiliki status peran sebagai 'seller'
        if (Auth::check() && Auth::user()->role === 'seller') {
            return $next($request);
        }

        // 🔴 Jika bukan seller, tendang kembali ke halaman home dengan pesan peringatan
        return redirect('/menu')->with('error', 'Akses ditolak! Anda harus mendaftar sebagai penjual terlebih dahulu.');
    }
}
