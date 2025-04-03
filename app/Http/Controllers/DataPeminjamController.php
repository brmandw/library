<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;


    class DataPeminjamController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'peminjam')->get();
        return view('admin.datapeminjam.index', compact('user'));

       
    }
    public function create()
    {
        $user = User::all();
        return view('admin.datapeminjam.create', compact('user')); 
    }

    public function store(Request $request)
    {
    
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:12',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'nullable|string|max:255',
        ]);
    
        if ($validator->fails()) {
            dd('Validasi gagal', $validator->errors()->toArray());
        }
    
        $data = $validator->validated();

        $data['role'] = 'peminjam';
    
        // Coba insert data manual untuk memastikan model berfungsi
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'alamat' => $data['alamat'],
        ]);
    
        return redirect()->route('admin.datapeminjam.index')->with('success', 'Data Peminjam berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

            // Cek apakah user yang sedang login ingin menghapus dirinya sendiri
            if (auth()->user()->id == $user->id) {
                return redirect()->back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
            }

        // Hapus obat
        $user->delete();

        return redirect()->route('admin.datapeminjam.index')->with('success', 'Data berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:12',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'alamat' => 'nullable|string|max:255',

        ]);

        // Update nama dan email
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->alamat = $validatedData['alamat'];

        // Update password hanya jika diisi
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.datapeminjam.index')->with('success', 'Data Peminjam berhasil diperbarui');
    }

    
}

