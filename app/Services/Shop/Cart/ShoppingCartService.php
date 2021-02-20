<?php

namespace App\Services\Shop\Cart;

use App\Models\Shop\Product;
use Illuminate\Http\Request;

/**
 * Service for shopping cart
 * https://github.com/darryldecode/laravelshoppingcart
 *
 * Class ShoppingCartService
 * @package App\Services\Shop\Cart
 */
class ShoppingCartService implements ICart
{
    /**
     * Add item to the cart
     *
     * @param Request $request
     * @return bool
     */
    public function add(Request $request): bool
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

        return true;
    }

    /**
     * Update item quantity in the cart
     *
     * @param Request $request
     * @return bool
     */
    public function update(Request $request): bool
    {
        $productId = $request->get('product_id');

        if ($quantity = ($request->get('quantity'))) {
            \Cart::update($productId, [
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity,
                ),
            ]);
            return true;
        }
        return false;
    }

    /**
     * Remove item from cart
     *
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        \Cart::remove($request->get('product_id'));
    }

    /**
     * Delete all items from cart
     */
    public function reset(): void
    {
        \Cart::clear();
    }

    /**
     * @return float|int
     */
    public function getTotalPrice()
    {
        return \Cart::getTotal();
    }

    /**
     * @return \Darryldecode\Cart\CartCollection
     */
    public function getContent()
    {
        return \Cart::getContent();
    }
}
