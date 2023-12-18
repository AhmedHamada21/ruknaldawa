<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'category_id',
        'product_code',
        'price_to',
        'price',
        'notes',
        'info',
        'photo',
        'quantity',
        'price_rali',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function ProductImages()
    {
        return $this->hasMany(ProductPhoto::class,'product_id');
    }

    public function ProductTage()
    {
        return $this->hasMany(ProductTage::class,'product_id');
    }

public function discount()
{
    if ($this->price_to > 0 && $this->price_to > $this->price) {
        $discountValue = $this->price_to - $this->price;
        $discountPercentage = ($discountValue / $this->price_to) * 100;
        
        return ceil($discountPercentage);
    }
    
    return 0; // إرجاع قيمة افتراضية في حالة عدم وجود خصم أو وجود قيم غير صحيحة
}



}
