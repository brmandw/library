<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    use HasFactory;

    protected $table = 'data_buku'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'kode_buku',
        'judul',
        'penulis',
        'penerbit',
        'id_kategori',
        'tahun_terbit',
        'dekripsi',
        'cover',
    ];
    public function kategoribuku()
    {
        return $this->belongsTo(KategoriBuku::class, 'id_kategori','id_kategori'); 
    }

        public function peminjaman()
    {
        return $this->hasMany(DataPeminjaman::class, 'id_buku','id');
    }

    
}
