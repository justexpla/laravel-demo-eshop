<?php

namespace App\Models\Shop;

use App\ModelFilters\ProductFilter;
use App\Models\Shop\Traits\HasPrice;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

/**
 * Class Product
 * @package App\Models\Shop
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property string $image
 * @property int $category_id
 * @property int|float $price
 * @method Builder active();
 */
class Product extends Model
{
    use HasFactory, HasPrice, Filterable;

    protected $table = 'shop_products';

    protected $guarded = [];

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
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Determine if product can be added to the cart
     *
     * @return bool
     */
    public function canBeAddedToCart(): bool
    {
        return $this->is_active && $this->price > 0;
    }
}
