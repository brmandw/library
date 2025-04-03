<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
            return $this->authenticated($request, Auth::user()); // Panggil method authenticated
        }

        // Jika kredensial salah, kirim pesan error menggunakan session
        return redirect()->back()->with('error', 'Username atau Password Salah');
    }
    protected function authenticated(Request $request, $user)
{
    if ($user->role == 'admin') {
        return redirect()->route('admin.index');
    } elseif ($user->role == 'petugas') {
        return redirect()->route('petugas.index');
    } elseif ($user->role == 'peminjam') {
        return redirect()->route('peminjam.index'); 
    }

    return redirect('/welcome'); // Default jika role tidak terdefinisi
}
}

