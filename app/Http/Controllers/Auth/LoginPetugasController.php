<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPetugasController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // Jika kredensial benar
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/index-petugas')->with('success', 'Berhasil Login!');;
        }

        // Jika kredensial salah, kirim pesan error menggunakan session
        return redirect()->back()->with('error', 'Username atau Password Salah');
    }

    public function loginPeminjam(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // Jika kredensial benar
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/index-peminjam')->with('success', 'Berhasil Login!');;
        }

        // Jika kredensial salah, kirim pesan error menggunakan session
        return redirect()->back()->with('error', 'Username atau Password Salah');
    }
}
