<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Middleware generate cart_id for user and put it into session
 *
 * Class GenerateCartId
 * @package App\Http\Middleware
 */
class InitializeCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->session()->get('cart_id')) {
            //since we don't have any id for unauthenticated user, we'll use big number, which won't conflict with real users carts
            $cartId = auth()->id() ?? generateNDigitsNumber(12);
            $request->session()->put('cart_id', $cartId);
            $request->session()->save();
        }

        \Cart::session($request->session()->get('cart_id'));

        return $next($request);
    }
}
