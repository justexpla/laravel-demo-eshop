<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Middleware checks, if cart is empty. If it is, redirects.
 *
 * Class CheckIfCartEmpty
 * @package App\Http\Middleware
 */
class CheckIfCartEmpty
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
        if (! \Cart::getContent()->count()) {
            return redirect()->route('shop.cart.index');
        }

        return $next($request);
    }
}
