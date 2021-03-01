<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

/**
 * Class ProductFilter
 * @package App\ModelFilters
 */
class ProductFilter extends ModelFilter
{
    /**
     * @param string $priceOrderDirection asc or desc
     * @return ProductFilter
     */
    public function price(string $priceOrderDirection)
    {
        if (in_array($priceOrderDirection, ['asc' , 'desc'])) {
            return $this->orderBy('price', $priceOrderDirection);
        }
    }
}
