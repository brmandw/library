<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBuku;
use App\Models\User;
use App\Models\DataPeminjaman;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class DataPeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = DataPeminjaman::with(['buku', 'user'])->get(); 
        return view("admin.datapeminjaman.index", compact('peminjaman'));
    }

    public function indexPetugas()
    {
        $peminjaman = DataPeminjaman::with(['buku', 'user'])->get(); 
        return view("petugas.datapeminjaman.index", compact('peminjaman'));
        
    }

        public function setuju($id)
    {
        $peminjaman = DataPeminjaman::findOrFail($id);
        
        // Ubah status menjadi "Dipinjam"
        $peminjaman->status = 'Dipinjam';
        $peminjaman->tanggal_peminjaman = now(); 
        $peminjaman->save();

        return redirect()->back()->with('success', 'Peminjaman telah disetujui.');
    }

    public function selesai($id)
    {
        $peminjaman = DataPeminjaman::findOrFail($id);
        
        // Ubah status menjadi "Dipinjam"
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->tanggal_pengembalian = now(); 
        $peminjaman->save();

        return redirect()->back()->with('success', 'Peminjaman telah selesai.');
    }



    public function create()
    {
        $data_buku = DataBuku::all();
        $user = User::auth()->user();
        return view("peminjam.perpustakaan.create", compact('data_buku', 'user'));
    }

    public function store(Request $request)
    {
    try {
        $validated = $request->validate([
                'id_buku' => 'required|integer',
                'id_user' => 'required|integer',
                'tanggal_peminjaman' => 'nullable|date',
                'tanggal_pengembalian' => 'nullable|date',        
        ]);

        DataPeminjaman::create([
            'id_buku' => $request->id_buku,
            'id_user' => auth()->id(),
            'tanggal_peminjaman' => null, 
            'tanggal_pengembalian' => null, 
        ]);
        

            return redirect()->route(route: 'peminjam.perpustakaan.index')->with('success', 'Buku berhasil diminta!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd('Validasi gagal', $e->errors()); // Debug validasi error
        }
    }

}
