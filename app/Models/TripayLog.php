<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripayLog extends Model
{
    use HasFactory;
    
    // The name of the table associated with the model.
    protected $table = 'pwp_tripay';

    // The attributes that are mass assignable.
    protected $fillable = [
        'trx_id',
        'user_id',
        'status',
        'amount',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class); // Relasi ke tabel users
    }
}
