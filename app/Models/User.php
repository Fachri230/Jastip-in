<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Tambahkan baris ini (sesuaikan dengan nama kolom ID di database Anda)
    protected $primaryKey = 'id_user'; 

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];
}
