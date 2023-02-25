<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentSubTotalPricePresentmentMoney extends Model
{
    protected $table = 'subt_price_pres_moneys';
    use HasFactory;

    protected $fillable = [
        'amount',
        'currency_code',
    ];

    public function order() {
        return $this->belongsToMany(Order::class,'order_currentSubPricePres_moneys',
            'id',
            'order_id'
        );
    }
}
