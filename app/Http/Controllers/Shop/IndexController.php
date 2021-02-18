<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::with(['children'])->get()->toTree();

        return view('shop.index')->with([
            'categories' => $categories
        ]);
    }
}
