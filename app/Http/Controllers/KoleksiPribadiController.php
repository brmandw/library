<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPeminjaman;
use App\Models\DataBuku;
use App\Models\User;

class KoleksiPribadiController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil hanya peminjaman milik user yang login
        $peminjaman = DataPeminjaman::with('buku')->where('id_user', $user->id)->get();
        return view("peminjam.koleksipribadi.index", compact('peminjaman', 'user'));
    }
}
