<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.cart');
    }

    public function add(int $product_id)
    {
        /** @var Product $product */
        $product = Product::findOrFail($product_id);

        if(! $product->canBeAddedToCart()) {
            return false;
        }

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ]);
    }

    public function remove(int $product_id)
    {
        \Cart::remove($product_id);
    }

    public function reset()
    {
        \Cart::clear();
    }

    public function update()
    {

    }
}
