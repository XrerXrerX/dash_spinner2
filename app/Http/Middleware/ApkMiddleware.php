<?php

namespace App\Http\Middleware;

use Closure;

class ApkMiddleware
{
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna memiliki divisi yang diizinkan
        if (auth()->check() && (auth()->user()->divisi === 'apk' || auth()->user()->divisi === 'superadmin')) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki divisi yang diizinkan, dapatkan URL saat ini
        $url = $request->url();

        // Redirect pengguna ke halaman lain atau tampilkan pesan error
        return redirect()->route('unauthorized')->with('message', 'Anda tidak diizinkan mengakses ' . $url);
    }
}
