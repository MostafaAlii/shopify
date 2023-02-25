<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtotal_price_shop_money extends Model
{
    use HasFactory;
    protected $table = 'subtotal_price_shop_moneys';
    protected $fillable = [
        'amount',
        'currency_code',
    ];

    public function order() {
        return $this->belongsToMany(Order::class,'order_subtotal_price_shop_money',
            'id',
            'order_id'
        );
    }
}
