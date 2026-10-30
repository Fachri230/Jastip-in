<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 🔴 PERBAIKAN MUTLAK: Beritahu Laravel bahwa primary key Anda adalah id_user
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];

    // ... sisa kode model User Anda ke bawah tetap biarkan ...
}
