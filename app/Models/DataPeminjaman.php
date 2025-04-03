<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id_buku',
        'id_user',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];
    public function buku()
    {
        return $this->belongsTo(DataBuku::class, 'id_buku', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
