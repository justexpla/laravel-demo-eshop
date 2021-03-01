<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\ModelFilters\ProductFilter;
use App\Models\Shop\Category;
use App\Models\Shop\Product;
use App\Repositories\Shop\CategoriesRepository;
use App\Repositories\Shop\ProductsRepository;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers\Shop
 */
class IndexController extends BaseController
{
    /** @var ProductsRepository */
    private $productsRepository;

    public function __construct()
    {
        $this->productsRepository = app(ProductsRepository::class)->withFilter(ProductFilter::class);
    }

    /**
     * Index page
     * url /
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = $this->productsRepository
            ->getProductsForIndexPage();

        return view('shop.index')->with([
            'products' => $products
        ]);
    }
}
