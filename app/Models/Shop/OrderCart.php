<?php

namespace App\Models\Shop;

use App\Models\Shop\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model
{
    use HasPrice;

    protected $table = 'shop_orders_carts';

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'cart_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * @return float|int
     */
    public function getTotal()
    {
        return $this->price * $this->quantity;
    }
}
