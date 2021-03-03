<?php

namespace App\Observers\Shop;

use App\Models\Shop\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function saving(Product $product)
    {
        $this->setSlug($product);
        $this->setDescription($product);
    }

    public function setSlug(Product $product)
    {
        if (empty($product->slug)) {
            $product->slug = Str::slug($product->title);
        }
    }

    public function setDescription(Product $product)
    {
        if (empty($product->description)) {
            $product->description = __('admin.products.no_description_placeholder');
        }
    }
}
