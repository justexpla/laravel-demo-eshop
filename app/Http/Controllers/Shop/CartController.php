<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\CartActionRequest;
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

    public function add(CartActionRequest $request)
    {
        /** @var Product $product */
        $product = Product::findOrFail($request->get('product_id'));
        $quantity = ($request->get('quantity')) ?? 1;

        if(! $product->canBeAddedToCart()) {
            return false;
        }

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $quantity,
            'attributes' => array(),
            'associatedModel' => $product
        ]);

        if (\request()->wantsJson()) {
            $response = json_encode([
                'status' => true,
                'cart_items_total' => \Cart::getContent()->count(),
                'cart_total_sum' => \Cart::getTotal(),
            ]);

            return $response;
        }
    }

    public function remove(CartActionRequest $request)
    {
        \Cart::remove($request->get('product_id'));

        if (\request()->wantsJson()) {
            $response = json_encode([
                'status' => true,
                'cart_items_total' => \Cart::getContent()->count(),
                'cart_total_sum' => \Cart::getTotal(),
            ]);

            return $response;
        }
    }

    public function reset()
    {
        \Cart::clear();

        return json_encode([
            'success' => true
        ]);
    }

    public function update(CartActionRequest $request)
    {
        $productId = $request->get('product_id');

        if ($quantity = ($request->get('quantity'))) {
            \Cart::update($productId, [
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity,
                ),
            ]);
        }

        if (\request()->wantsJson()) {
            $response = json_encode([
                'status' => true,
                'cart_items_total' => \Cart::getContent()->count(),
                'cart_total_sum' => \Cart::getTotal(),
                'new_quantity' => \Cart::get($productId)->quantity,
            ]);

            return $response;
        }
    }
}
