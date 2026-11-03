<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'id_store';

    
  protected $fillable = [
    'user_id', 'store_name', 'slug', 'description',
    'address', 'phone', 'logo', 'status', 'rejection_reason',
];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}