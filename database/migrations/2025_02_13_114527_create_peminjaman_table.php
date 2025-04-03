<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) { 
            $table->id();
            $table->unsignedBigInteger('id_buku'); 
            $table->unsignedBigInteger('id_user'); 
            $table->date('tanggal_peminjaman')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
            $table->enum('status', ['Diminta', 'Dipinjam', 'Dikembalikan', 'Terlambat Dikembalikan'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
