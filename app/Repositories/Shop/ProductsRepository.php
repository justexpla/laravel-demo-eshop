<?php

namespace App\Repositories\Shop;

use App\Models\Shop\Product as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Kalnoy\Nestedset\NestedSet;

/**
 * Class ProductsRepository
 * @package App\Repositories\Shop
 */
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

    public function __construct(?int $perPage = null)
    {
        parent::__construct();

        $this->perPage = $perPage ?? config('shop.catalog_products_per_page') ?? 15;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getProductsForIndexPage(): LengthAwarePaginator
    {
        $data = $this->startConditions()
            ->active()
            ->select(['title', 'image', 'price', 'description', 'slug'])
            ->where(['is_active' => true])
            ->latest()
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
            ->where(['is_active' => true])
            ->latest()
            ->paginate($this->perPage);

        return $data;
    }

    public function getProductsForAdminListPage(): LengthAwarePaginator
    {
        $data = $this->startConditions()
            ->select(['id', 'title', 'price', 'is_active', 'description', 'slug', 'category_id'])
            ->with(['category'])
            ->orderByDesc('id')
            ->paginate($this->perPage);

        return $data;
    }
}
