<?php

namespace App\Observers\Shop;

use App\Models\Shop\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Category saving event
     * 
     * @param Category $category
     */
    public function saving(Category $category)
    {
        $this->setSlug($category);
    }

    /**
     * Set category slug
     * 
     * @param Category $category
     * @return Category
     */
    public function setSlug(Category $category)
    {
        if (empty($category->slug)) {
            $category->slug = Str::slug($category->title);
        }
    }
}
