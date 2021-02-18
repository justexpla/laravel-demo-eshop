<?php

namespace App\Repositories\Shop;

use App\Models\Shop\Product as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Kalnoy\Nestedset\NestedSet;

class ProductsRepository extends BaseRepository
{
    /** @var int */
    protected $perPage;

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function __construct()
    {
        parent::__construct();

        $this->perPage = config('shop.catalog_products_per_page') ?? 15;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getProductsForIndexPage(): LengthAwarePaginator
    {
        $data = $this->startConditions()
            ->active()
            ->select(['title', 'image', 'price', 'description', 'slug'])
            ->paginate($this->perPage);

        return $data;
    }

    /**
     * Returns products of categories
     *
     * @param array $categoriesIds
     * @return LengthAwarePaginator
     */
    public function getProductsByCategoriesIds(array $categoriesIds): LengthAwarePaginator
    {
        $data = $this->startConditions()
            ->select(['title', 'image', 'price', 'description', 'slug'])
            ->whereIn('category_id', $categoriesIds)
            ->paginate($this->perPage);

        return $data;
    }
}
