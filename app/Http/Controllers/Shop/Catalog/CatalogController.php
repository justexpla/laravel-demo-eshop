<?php

namespace App\Http\Controllers\Shop\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shop\BaseController;
use App\ModelFilters\ProductFilter;
use App\Models\Shop\Category;
use App\Models\Shop\Product;
use App\Repositories\Shop\CategoriesRepository;
use App\Repositories\Shop\ProductsRepository;
use Illuminate\Http\Request;

/**
 * Class CatalogController
 * @package App\Http\Controllers\Shop\Catalog
 */
class CatalogController extends BaseController
{
    /** @var ProductsRepository */
    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = app(ProductsRepository::class)->withFilter(ProductFilter::class);
    }

    /**
     * Show catalog category
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(Category $category)
    {
        $categoriesIds = array_merge([$category->id], $category->getChildrenIds());

        $products = $this->productRepository
            ->getProductsByCategoriesIds($categoriesIds);

        return view('shop.catalog.category')->with([
            'products' => $products,
            'categoryTitle' => $category->title,
        ]);
    }

    /**
     * Show catalog product
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function product(Product $product)
    {
        return view('shop.catalog.product')->with([
            'product' => $product
        ]);
    }
}
