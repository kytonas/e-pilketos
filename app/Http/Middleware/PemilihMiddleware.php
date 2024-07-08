<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemilihMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('pemilih')) {
            $pemilihId = Session::get('pemilih');
            $pemilih = \App\Models\Pemilih::findOrFail($pemilihId);

            if ($pemilih) {
                // Set pemilih pada request agar dapat diakses di controller
                $request->attributes->set('pemilih', $pemilih);
                return $next($request);
            }

            // Jika pemilih tidak ditemukan, hapus session dan redirect ke halaman login
            Session::forget('pemilih');
        }

        // Jika session 'pemilih' tidak ada, redirect ke halaman login
        return redirect()->route('pemilih.login');
    }
}
