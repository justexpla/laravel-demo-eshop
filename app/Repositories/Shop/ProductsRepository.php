<?php

namespace App\Repositories\Shop;

use App\Models\Shop\Product as Model;
use Illuminate\Database\Eloquent\Collection;
use Kalnoy\Nestedset\NestedSet;

class ProductsRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * @return Collection
     */
    public function getProductsForIndexPage()
    {
        $count = config('shop.catalog_products_per_page');

        $data = $this->startConditions()
            ->active()
            ->select(['title', 'image', 'price', 'description'])
            ->paginate($count);

        return $data;
    }
}
