<?php

namespace App\Models\Shop\Traits;

/**
 * Trait HasPrice
 * @package App\Models\Shop\Traits
 */
trait HasPrice
{
    /**
     * @param $price
     * @return float|int
     */
    public function getPriceAttribute($price)
    {
        return $price % 10000
            ? (float) round($price / 10000, 2)
            : (int) $price / 10000;
    }

    /**
     * @param $price
     */
    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = (int)($price * 10000);
    }
}
