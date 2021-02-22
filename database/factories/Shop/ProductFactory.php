<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Category;
use App\Models\Shop\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryId = Category::first()->id;

        $price = random_int(10, 10000);

        $active = rand(1, 10) !== 1;
        $title = $this->faker->sentence(rand(3, 5));
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(),
            'is_active' => $active,
            'price' => $active ? $price : null,
            'image' => null,
            'category_id' => $categoryId,
        ];
    }
}
