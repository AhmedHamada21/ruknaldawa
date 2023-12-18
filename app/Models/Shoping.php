<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoping extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name_address',
        'last_name_address',
        'region_address',
        'address',
        'address_1',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

