<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Menghubungkan model ke nama tabel asli di database MySQL Anda
    protected $table = 'stocks';

    // Mengizinkan kolom-kolom ini agar bisa diisi data oleh form
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'satuan',
        'status'
    ];
}
