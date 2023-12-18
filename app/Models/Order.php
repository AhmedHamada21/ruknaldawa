<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    const ORDERCOMPTITED = 0;
    const ORDERSUCCESS = 1;
    const ORDERERROR = 2;
    const ORDERASSGIN = 3;
    const ORDERREFUND = 4;
    protected $fillable = [
        'user_id',
        'total',
        'status',
        'code',
    ];

    public function status()
    {
        switch ($this->status) {
            case 0:
                $result = 'طلب جديد';
                break;
            case 1:
                $result = 'طلب مكتمل';
                break;
            case 2:
                $result = 'طلب مرفوض';
                break;
            case 3:
                $result = 'تم تعين الطلب';
                break;
            case 4:
                $result = 'تم استرجاع الطلب';
                break;
        }

        return $result;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
    }

}
