<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [];
    protected $casts = [
        'current_subtotal_price_set' => 'array',
        'current_total_discounts_set' => 'array',
        'current_total_price_set' => 'array',
        'current_total_tax_set' => 'array',
        'discount_applications' => 'array',
        'discount_codes' => 'array',
        'line_items' => 'array',
        'note_attributes' => 'array',
        'presentment_currency' => 'array',
        'shipping_address' => 'array',
        'shipping_lines' => 'array',
        'subtotal_price_set' => 'array',
        'tax_lines' => 'array',
        'total_discounts_set' => 'array',
        'total_price_set' => 'array',
        'total_tax_set' => 'array',
    ];

    public function subtotal_price_shop_money() {
        return $this->belongsToMany(Subtotal_price_shop_money::class,'order_subtotal_price_shop_money',
            'order_id',
            'subTotalShop_money_id'
        );
    }

    public function currentSubTotalPricePresentmentMoney() {
        return $this->belongsToMany(CurrentSubTotalPricePresentmentMoney::class,'order_currentSubPricePres_moneys',
            'order_id',
            'subTotalPresentMoneyId'
        );
    }

    public function order_details()
    {
        return $this->hasOne(OrderDetails::class, 'id');
    }


    public function orderdetails()
    {
        return $this->hasOne(OrderDetails::class,'order_id');
    }

}
