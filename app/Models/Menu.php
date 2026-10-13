<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_user',
        'img',
        'nm_produk',
        'harga',
        'desc',
        'kategori',
        'stok',
    ];
}

