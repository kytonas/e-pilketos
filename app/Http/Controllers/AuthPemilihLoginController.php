<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemilih;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class AuthPemilihLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.pemilih-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nis', 'password');
        $pemilih = Pemilih::where('nis', $credentials['nis'])->first();

        if ($pemilih && Hash::check($credentials['password'], $pemilih->password)){
            Session::put('pemilih', $pemilih);
            return redirect()->intended('/');
        }
        return redirect()->back()->withInput($request->only('nis'))->withErrors(['nis'=> 'NIS atau Pasword salah']);
    }

    public function logout()
    {
        Session::forget('pemilih');
        return redirect('/login');
    }
}
