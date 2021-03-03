<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\CartActionRequest;
use App\Models\Shop\Product;
use App\Services\Shop\Cart\ShoppingCartService;
use Illuminate\Http\Request;

/**
 * Class CartController
 * @package App\Http\Controllers\Shop
 */
class CartController extends BaseController
{
    /**
     * @var ShoppingCartService
     */
    private $cartService;

    public function __construct(ShoppingCartService $shoppingCartService)
    {
        $this->cartService = $shoppingCartService;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('shop.cart');
    }

    /**
     * @param CartActionRequest $request
     * @return bool|string
     */
    public function add(CartActionRequest $request)
    {
        $this->cartService->add($request);

        if (\request()->wantsJson()) {
            $response = response()->json([
                'status' => true,
                'cart_items_total' => \Cart::getContent()->count(),
                'cart_total_sum' => \Cart::getTotal(),
            ]);

            return $response;
        }
    }

    /**
     * @param CartActionRequest $request
     * @return bool|string
     */
    public function remove(CartActionRequest $request)
    {
        $this->cartService->remove($request);

        if (\request()->wantsJson()) {
            $response = response()->json([
                'status' => true,
                'cart_items_total' => \Cart::getContent()->count(),
                'cart_total_sum' => \Cart::getTotal(),
            ]);

            return $response;
        }
    }

    /**
     * @return bool|string
     */
    public function reset()
    {
        $this->cartService->reset();

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param CartActionRequest $request
     * @return bool|string
     */
    public function update(CartActionRequest $request)
    {
        $this->cartService->update($request);

        if (\request()->wantsJson()) {
            $response = response()->json([
                'status' => true,
                'cart_items_total' => \Cart::getContent()->count(),
                'cart_total_sum' => \Cart::getTotal(),
                'new_quantity' => \Cart::get($request->get('product_id'))->quantity,
            ]);

            return $response;
        }
    }
}
