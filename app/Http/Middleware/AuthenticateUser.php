<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Jika pengguna telah login, lanjutkan dengan permintaan berikutnya
            return $next($request);
        } else {
            // Jika pengguna belum login, redirect ke halaman login
            return redirect()->route('login');
        }
    }
}
