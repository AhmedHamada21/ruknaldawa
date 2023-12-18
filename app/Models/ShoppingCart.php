<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'rowId',
        'product_id',
        'qty',
        'tax',
        'subtotal',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
