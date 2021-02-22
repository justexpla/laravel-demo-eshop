<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'shop_orders';

    protected $fillable = [
        'id', 'cart_id', 'user_id', 'status', 'fullname', 'phone', 'address', 'commentary', 'email', 'total_price'
    ];

    /**
     * @var string
     */
    const STATUS_AWAITING_PAYMENT = 'awaiting_payment';

    /**
     * @var string
     */
    const STATUS_AWAITING_SHIPPING = 'awaiting_shipping';

    /**
     * @var string
     */
    const STATUS_SHIPPED = 'shipped';

    /**
     * Returns list of supported statuses
     *
     * @return string[]
     */
    public static function getStatusList(): array
    {
        return [
            self::STATUS_AWAITING_PAYMENT,
            self::STATUS_AWAITING_SHIPPING,
            self::STATUS_SHIPPED
        ];
    }

    /**
     * @return bool
     */
    public function isAwaitingPayment(): bool
    {
        return $this->status === self::STATUS_AWAITING_PAYMENT;
    }

    /**
     * @return bool
     */
    public function isAwaitingShipping(): bool
    {
        return $this->status === self::STATUS_AWAITING_SHIPPING;
    }

    /**
     * @return bool
     */
    public function isShipped(): bool
    {
        return $this->status === self::STATUS_SHIPPED;
    }

    public function cart()
    {
        return $this->hasMany(OrderCart::class, 'order_id', 'id');
    }

    /**
     * Returns status title to show on page
     *
     * @return string
     */
    public function getStatusTitle()
    {
        return __('order.'. $this->status);
    }
}
