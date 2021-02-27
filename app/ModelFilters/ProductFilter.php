<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    public function price($priceOrderDirection)
    {
        if (in_array($priceOrderDirection, ['asc' , 'desc'])) {
            return $this->orderBy('price', $priceOrderDirection);
        }
    }
}
