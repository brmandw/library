<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBuku;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class DataBukuController extends Controller
{
    public function index()
    {
        $data_buku = DataBuku::all();
        $kategoribuku = KategoriBuku::all();
        return view('admin.databuku.index', compact('data_buku', 'kategoribuku')); 
    }

    public function indexPetugas()
    {
        $data_buku = DataBuku::all();
        $kategoribuku = KategoriBuku::all();
        return view('petugas.databuku.index', compact('data_buku', 'kategoribuku')); 
    }

    public function perpustakaan()
    {
        $data_buku = DataBuku::all();
        return view('peminjam.perpustakaan.index', compact('data_buku')); 
    }

    public function create()
    {
        $kategoribuku = KategoriBuku::all();
        return view('admin.databuku.create', compact( 'kategoribuku')); 
    }

    public function createPetugas()
    {
        $kategoribuku = KategoriBuku::all();
        return view('petugas.databuku.create', compact( 'kategoribuku')); 
    }


    /**
     * Menyimpan data buku ke database
     */
    public function store(Request $request)
    {
       
    try {
        $validated = $request->validate([
            'kode_buku' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'id_kategori' => 'nullable|string|max:255',
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'deskripsi' => 'required|string|max:700',
        ]);


        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        DataBuku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'id_kategori' => $request->id_kategori,
            'tahun_terbit' => $request->tahun_terbit,
            'cover' => $coverPath,
            'deskripsi' => $request->deskripsi
        ]);
        
       


        return redirect()->route('admin.databuku.index')->with('success', 'Buku berhasil ditambahkan!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        dd('Validasi gagal', $e->errors()); // Debug validasi error
    }
}


public function storePetugas(Request $request)
{
try {
    $validated = $request->validate([
        'kode_buku' => 'required|string|max:255',
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'id_kategori' => 'nullable|string|max:255',
        'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
        'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'deskripsi' => 'required|string|max:700',
    ]);


    $coverPath = null;
    if ($request->hasFile('cover')) {
        $coverPath = $request->file('cover')->store('covers', 'public');
    }

    DataBuku::create([
        'kode_buku' => $request->kode_buku,
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'id_kategori' => $request->id_kategori,
        'tahun_terbit' => $request->tahun_terbit,
        'cover' => $coverPath,
        'deskripsi' => $request->deskripsit,
    ]);
    

    return redirect()->route('petugas.databuku.index')->with('success', 'Buku berhasil ditambahkan!');
} catch (\Illuminate\Validation\ValidationException $e) {
    dd('Validasi gagal', $e->errors()); // Debug validasi error
}
}

public function destroy($id)
{
    $data_buku = DataBuku::findOrFail($id);

    // Hapus obat
    $data_buku->delete();

    return redirect()->route('admin.databuku.index')->with('success', 'Data berhasil dihapus.');
}

public function destroyPetugas($id)
{
    $data_buku = DataBuku::findOrFail($id);

    // Hapus obat
    $data_buku->delete();

    return redirect()->route('petugas.databuku.index')->with('success', 'Data berhasil dihapus.');
}

public function update(Request $request, $id)
{
    $data_buku = DataBuku::findOrFail($id);

    $validatedData = $request->validate([
        'kode_buku' => 'required|string|max:255',
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'id_kategori' => 'nullable|string|max:255',
        'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
        'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'deskripsi' => 'required|string|max:700',
    ]);

    $data_buku->kode_buku = $validatedData['kode_buku'];
    $data_buku->judul = $validatedData['judul'];
    $data_buku->penulis= $validatedData['penulis'];
    $data_buku->penerbit = $validatedData['penerbit'];
    $data_buku->id_kategori = $validatedData['id_kategori'] ?? null;
    $data_buku->tahun_terbit = $validatedData['tahun_terbit'];
    $data_buku->deskripsi = $validatedData['deskripsi'];

    // Jika ada cover baru, simpan dan hapus yang lama
    if ($request->hasFile('cover')) {
        // Hapus cover lama jika ada
        if ($data_buku->cover) {
            \Storage::delete('public/covers/' . $data_buku->cover);
        }

        $coverPath = $request->file('cover')->store('covers', 'public'); 
        $data_buku->cover = $coverPath;
    }

    $data_buku->save();

    return redirect()->route('admin.databuku.index')->with('success', 'Data Buku berhasil diperbarui');
}

public function updatePetugas(Request $request, $id)
{
    $data_buku = DataBuku::findOrFail($id);

    $validatedData = $request->validate([
        'kode_buku' => 'required|string|max:255',
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'id_kategori' => 'nullable|string|max:255',
        'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
        'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'deskripsi' => 'required|string|max:700',
    ]);

    $data_buku->kode_buku = $validatedData['kode_buku'];
    $data_buku->judul = $validatedData['judul'];
    $data_buku->penulis= $validatedData['penulis'];
    $data_buku->penerbit = $validatedData['penerbit'];
    $data_buku->id_kategori = $validatedData['id_kategori'] ?? null;
    $data_buku->tahun_terbit = $validatedData['tahun_terbit'];
    $data_buku->deskripsi = $validatedData['deskripsi'];


    // Jika ada cover baru, simpan dan hapus yang lama
    if ($request->hasFile('cover')) {
        // Hapus cover lama jika ada
        if ($data_buku->cover) {
            \Storage::delete('public/covers/' . $data_buku->cover);
        }

        $coverPath = $request->file('cover')->store('covers', 'public'); 
        $data_buku->cover = $coverPath;
    }

    $data_buku->save();

    return redirect()->route('petugas.databuku.index')->with('success', 'Data Buku berhasil diperbarui');
}

}