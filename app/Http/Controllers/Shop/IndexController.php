<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Category;
use App\Models\Shop\Product;
use App\Repositories\Shop\CategoriesRepository;
use App\Repositories\Shop\ProductsRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /** @var CategoriesRepository */
    private $categoriesRepository;

    /** @var ProductsRepository */
    private $productsRepository;

    public function __construct()
    {
        $this->categoriesRepository = app(CategoriesRepository::class);
        $this->productsRepository = app(ProductsRepository::class);
    }

    /**
     * Index page
     * url /
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = $this->categoriesRepository
            ->getCategoriesAsTree();

        $products = $this->productsRepository
            ->getProductsForIndexPage();

        return view('shop.index')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
