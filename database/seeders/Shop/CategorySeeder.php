<?php

namespace Database\Seeders\Shop;

use App\Models\Shop\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Creating nested tree with depth = 3 */
        Category::factory()->count(5)
            ->create()
            ->each(function (Category $category) {
                $count = rand(0, 4);

                $category->children()->saveMany(
                    Category::factory()->count($count)->create()
                        ->each(function (Category $subCategory) {
                            $count = rand(0, 5);

                            $subCategory->children()->saveMany(
                                Category::factory()->count($count)->create()
                            );
                        })
                );
            });
    }
}
