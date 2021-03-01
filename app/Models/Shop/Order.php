<?php

namespace App\Models\Shop;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models\Shop
 * @property int $id
 * @property int $user_id
 * @property int $total_price
 * @property string $status
 * @property string $fullname
 * @property int $phone
 * @property string $address
 * @property string $commentary
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart()
    {
        return $this->hasMany(OrderCart::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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

    /**
     * @param $total_price
     * @return float|int
     */
    public function getTotalPriceAttribute($total_price)
    {
        return $total_price % 10000
            ? (float) round($total_price / 10000, 2)
            : (int) $total_price / 10000;
    }

    /**
     * @param $total_price
     */
    public function setTotalPriceAttribute($total_price)
    {
        $this->attributes['total_price'] = (int)($total_price * 10000);
    }
}
