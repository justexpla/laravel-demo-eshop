<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'shop_products';

    /**
     * Returns only active records
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where(['is_active' => true]);
    }

    /**
     * @param int|null $limit
     * @return string
     */
    public function getShortDescription(?int $limit = null): string
    {
        if (! $limit) {
            $limit = config('shop.catalog_item_short_description_length');
        }

        return Str::limit($this->description, $limit);
    }

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

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
