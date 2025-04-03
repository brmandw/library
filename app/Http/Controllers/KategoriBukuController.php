<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Validator;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategoribuku = KategoriBuku::all();
        return view("admin.kategoribuku.index", compact('kategoribuku'));
    }

    public function create()
    {
        $kategoribuku = KategoriBuku::all();
        return view('admin.kategoribuku.create', compact('kategoribuku')); 
    }

    public function store(Request $request)
    {
    
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            dd('Validasi gagal', $validator->errors()->toArray());
        }
    
        $data = $validator->validated();

        // Coba insert data manual untuk memastikan model berfungsi
        $kategoribuku = KategoriBuku::create([
            'nama_kategori' => $data['nama_kategori'],
        ]);
    
        return redirect()->route('admin.kategoribuku.index')->with('success', 'Kategori Buku berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $kategoribuku = KategoriBuku::findOrFail($id);

        $kategoribuku->delete();

        return redirect()->route('admin.kategoribuku.index')->with('success', 'Data berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $kategoribuku = KategoriBuku::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoribuku->nama_kategori = $validatedData['nama_kategori'];

        $kategoribuku->save();

        return redirect()->route('admin.kategoribuku.index')->with('success', 'Data berhasil diperbarui');
    }




    public function indexPetugas()
    {
        $kategoribuku = KategoriBuku::all();
        return view("petugas.kategoribuku.index", compact('kategoribuku'));
    }

    public function createPetugas()
    {
        $kategoribuku = KategoriBuku::all();
        return view('petugas.kategoribuku.create', compact('kategoribuku')); 
    }

    public function storePetugas(Request $request)
    {
    
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            dd('Validasi gagal', $validator->errors()->toArray());
        }
    
        $data = $validator->validated();

        // Coba insert data manual untuk memastikan model berfungsi
        $kategoribuku = KategoriBuku::create([
            'nama_kategori' => $data['nama_kategori'],
        ]);
    
        return redirect()->route('petugas.kategoribuku.index')->with('success', 'Kategori Buku berhasil ditambahkan');
    }

    public function destroyPetugas($id)
    {
        $kategoribuku = KategoriBuku::findOrFail($id);

        $kategoribuku->delete();

        return redirect()->route('petugas.kategoribuku.index')->with('success', 'Data berhasil dihapus.');
    }

    public function updatePetugas(Request $request, $id)
    {
        $kategoribuku = KategoriBuku::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoribuku->nama_kategori = $validatedData['nama_kategori'];

        $kategoribuku->save();

        return redirect()->route('petugas.kategoribuku.index')->with('success', 'Data berhasil diperbarui');
    }
}
