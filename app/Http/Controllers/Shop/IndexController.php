<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Category;
use App\Repositories\Shop\CategoriesRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /** @var CategoriesRepository */
    private $categoriesRepository;

    public function __construct()
    {
        $this->categoriesRepository = app(CategoriesRepository::class);
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

        return view('shop.index')->with([
            'categories' => $categories
        ]);
    }
}
