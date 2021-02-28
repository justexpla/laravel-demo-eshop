<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreateRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Shop\Product;
use App\Repositories\Shop\CategoriesRepository;
use App\Repositories\Shop\ProductsRepository;
use App\Services\Shop\Catalog\ProductsService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @var ProductsRepository
     */
    private $productsRepository;

    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    /**
     * @var ProductsService
     */
    private $productsService;

    public function __construct()
    {
        $this->productsRepository = resolve(ProductsRepository::class, ['perPage' => config('admin_settings.products.per_page')]);
        $this->categoriesRepository = app(CategoriesRepository::class);
        $this->productsService = app(ProductsService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = $this->productsRepository
            ->getProductsForAdminListPage();

        return view('admin.catalog.products.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('admin.catalog.products.show')->with([
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $parentCategories = $this->categoriesRepository
            ->getCategoriesAsTree();

        return view('admin.catalog.products.create')->with([
            'parentCategories' => $parentCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $product = $this->productsService
            ->create($request);

        if ($product) {
            return redirect()->route('admin.products.edit', ['product' => $product, 'parent_id' => $product->category_id])->with([
                'status' => "Product {$product->title} has been created"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        $parentCategories = $this->categoriesRepository
            ->getCategoriesAsTree();

        return view('admin.catalog.products.edit')->with([
            'product' => $product,
            'parentCategories' => $parentCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $result = $this->productsService
            ->update($product, $request);

        if ($result) {
            return redirect()->route('admin.products.edit', ['product' => $product, 'parent_id' => $product->category_id])->with([
                'status' => "Product {$product->title} has been updated"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $result = $this->productsService->delete($product);

        if ($result) {
            return redirect()->route('admin.products.index')->with([
                'status-danger' => "Product {$product->title} has been deleted"
            ]);
        }
    }
}
