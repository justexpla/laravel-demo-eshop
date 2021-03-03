<?php

namespace App\Providers;

use App\Models\Shop\Category;
use App\Models\Shop\Product;
use App\Observers\Shop\CategoryObserver;
use App\Observers\Shop\ProductObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}
