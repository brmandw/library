<?php

use App\Http\Controllers\Auth\LoginPetugasController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\DataPeminjamController;
use App\Http\Controllers\DataPetugasController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\KoleksiPribadiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DataPeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login-admin', function () {
    return view('admin.login');
})->name('login-admin');
Route::post('/login-admin', [LoginController::class, 'login']);

Route::get('/login-petugas', function () {
    return view('petugas.login');
})->name('login-petugas');
Route::post('/login-petugas', [LoginController::class, 'login']);

Route::get('/login-peminjam', function () {
    return view('peminjam.login');
})->name('login-peminjam');
Route::post('/login-peminjam', [LoginController::class, 'login']);


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/index', [IndexController::class, 'index'])->name('admin.index');

    Route::get('/data-admin', [DataAdminController::class, 'index'])->name('admin.dataadmin.index');
    Route::get('/data-admin/create', [DataAdminController::class, 'create'])->name('admin.dataadmin.create');
    Route::post('/data-admin', [DataAdminController::class, 'store'])->name('admin.dataadmin.store');
    Route::delete('/data-admin/{id}', [DataAdminController::class, 'destroy'])->name('admin.dataadmin.destroy');
    Route::put('data-admin/{id}/edit', [DataAdminController::class, 'update'])->name('admin.dataadmin.update');

    Route::get('/data-petugas', [DataPetugasController::class, 'index'])->name('admin.datapetugas.index');
    Route::get('/data-petugas/create', [DataPetugasController::class, 'create'])->name('admin.datapetugas.create');
    Route::post('/data-petugas', [DataPetugasController::class, 'store'])->name('admin.datapetugas.store');
    Route::delete('/data-petugas/{id}', [DataPetugasController::class, 'destroy'])->name('admin.datapetugas.destroy');
    Route::put('data-petugas/{id}/edit', [DataPetugasController::class, 'update'])->name('admin.datapetugas.update');

    Route::get('/data-peminjam', [DataPeminjamController::class, 'index'])->name('admin.datapeminjam.index');
    Route::get('/data-peminjam/create', [DataPeminjamController::class, 'create'])->name('admin.datapeminjam.create');
    Route::post('/data-peminjam', [DataPeminjamController::class, 'store'])->name('admin.datapeminjam.store');
    Route::delete('/data-peminjam/{id}', [DataPeminjamController::class, 'destroy'])->name('admin.datapeminjam.destroy');
    Route::put('data-peminjam/{id}/edit', [DataPeminjamController::class, 'update'])->name('admin.datapeminjam.update');

    Route::get('/data-buku', [DataBukuController::class, 'index'])->name('admin.databuku.index');
    Route::get('/data-buku/create', [DataBukuController::class, 'create'])->name('admin.databuku.create');
    Route::post('/data-buku', [DataBukuController::class, 'store'])->name('admin.databuku.store');
    Route::delete('/data-buku/{id}', [DataBukuController::class, 'destroy'])->name('admin.databuku.destroy');
    Route::put('data-buku/{id}', [DataBukuController::class, 'update'])->name('admin.databuku.update');

    Route::get('/data-peminjaman', [DataPeminjamanController::class, 'index'])->name('admin.datapeminjaman.index');
    
    Route::get('/kategori-buku', [KategoriBukuController::class, 'index'])->name('admin.kategoribuku.index');
    Route::get('/kategori-buku/create', [KategoriBukuController::class, 'create'])->name('admin.kategoribuku.create');
    Route::post('/kategori-buku', [KategoriBukuController::class, 'store'])->name('admin.kategoribuku.store');
    Route::delete('/kategori-buku/{id}', [KategoriBukuController::class, 'destroy'])->name('admin.kategoribuku.destroy');
    Route::put('kategori-buku/{id}/edit', [KategoriBukuController::class, 'update'])->name('admin.kategoribuku.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/index-petugas', [IndexController::class, 'indexPetugas'])->name('petugas.index');
    
    Route::get('/data-buku-petugas', [DataBukuController::class, 'indexPetugas'])->name('petugas.databuku.index');
    Route::get('/data-buku-petugas/create', [DataBukuController::class, 'createPetugas'])->name('petugas.databuku.create');
    Route::post('/data-buku-petugas', [DataBukuController::class, 'storePetugas'])->name('petugas.databuku.store');
    Route::delete('/data-buku-petugas/{id}', [DataBukuController::class, 'destroyPetugas'])->name('petugas.databuku.destroy');
    Route::put('data-buku/{id}/edit', [DataBukuController::class, 'updatePetugas'])->name('petugas.databuku.update');

    Route::get('/data-peminjaman-petugas', [DataPeminjamanController::class, 'indexPetugas'])->name('petugas.datapeminjaman.index');
    Route::post('/peminjaman/setuju/{id}', [DataPeminjamanController::class, 'setuju'])->name('peminjaman.setuju');
    Route::post('/peminjaman/selesai/{id}', [DataPeminjamanController::class, 'selesai'])->name('peminjaman.selesai');

    Route::get('/kategori-buku-petugas', [KategoriBukuController::class, 'indexPetugas'])->name('petugas.kategoribuku.index');
    Route::get('/kategori-buku-petugas/create', [KategoriBukuController::class, 'createPetugas'])->name('petugas.kategoribuku.create');
    Route::post('/kategori-buku-petugas', [KategoriBukuController::class, 'storePetugas'])->name('petugas.kategoribuku.store');
    Route::delete('/kategori-buku-petugas/{id}', [KategoriBukuController::class, 'destroyPetugas'])->name('petugas.kategoribuku.destroy');
    Route::put('kategori-buku-petugas/{id}/edit', [KategoriBukuController::class, 'updatePetugas'])->name('petugas.kategoribuku.update');

    Route::post('/logout-petugas', [AuthController::class, 'logoutPetugas'])->name('logout-petugas');
});

Route::middleware(['auth', 'role:peminjam'])->group(function () {
    Route::get('/index-peminjam', [IndexController::class, 'indexPeminjam'])->name('peminjam.index');

    Route::get('/perpustakaan', [DataBukuController::class, 'perpustakaan'])->name('peminjam.perpustakaan.index');
    Route::get('/perpustakaan/pinjam', [DataPeminjamanController::class, 'create'])->name('peminjam.perpustakaan.create');
    Route::post('/perpustakaan', [DataPeminjamanController::class, 'store'])->name('peminjam.perpustakaan.store');

    Route::get('/koleksipribadi', [KoleksiPribadiController::class, 'index'])->name('peminjam.koleksipribadi.index');

    Route::post('/logout-peminjam', [AuthController::class, 'logoutPeminjam'])->name('logout-peminjam');
});
