<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('stocks', function (Blueprint $table) {
        $table->id(); // Membuat primary key otomatis bernama 'id'
        $table->string('nama_barang');
        $table->integer('jumlah');
        $table->string('satuan'); // Pcs, Pack, Kg, Box, dll.
        $table->string('status'); // Tersedia / Habis
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
