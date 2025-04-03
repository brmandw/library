<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }

    public function indexPetugas()
    {
        return view("petugas.index");
    }
    public function indexPeminjam()
    {
        return view("peminjam.index");
    }

    public function __construct()
{
    $this->middleware(function ($request, $next) {
        // Mencegah cache di browser setelah logout
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        return $next($request);
    });
}

}
