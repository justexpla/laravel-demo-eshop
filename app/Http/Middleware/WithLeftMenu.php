<?php

namespace App\Http\Middleware;

use App\Repositories\Shop\CategoriesRepository;
use Closure;
use Illuminate\Http\Request;

class WithLeftMenu
{
    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    public function __construct()
    {
        $this->categoriesRepository = app(CategoriesRepository::class);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $categories = $this->categoriesRepository
            ->getCategoriesAsTree();

        $request->attributes->add(['leftMenu' => $categories]);

        return $next($request);
    }
}
