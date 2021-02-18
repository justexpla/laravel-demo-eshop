<?php

namespace Database\Seeders\Shop;

use App\Models\Shop\Category;
use App\Models\Shop\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesIds = Category::all()->pluck('id')->toArray();

        $products = Product::factory()->count(100)->make()
            ->each(function (Product $product) use ($categoriesIds) {
                $product->category_id = Arr::random($categoriesIds);

                $product->save();
            });
    }
}
