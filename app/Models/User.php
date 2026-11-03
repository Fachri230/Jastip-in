<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Karena primary key Anda 'id_user', beritahu Laravel di sini:
    protected $primaryKey = 'id_user';

    // Kolom apa saja yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke tabel Stores (Toko Penjual)
    public function store()
    {
        return $this->hasOne(Store::class, 'user_id', 'id_user');
    }

    // Helper untuk mengecek role
    public function isSeller()
    {
        return $this->role === 'seller';
    }
}