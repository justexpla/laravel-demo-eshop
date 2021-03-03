<?php

namespace App\Services\Shop\Catalog;

use App\Models\Shop\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class CategoriesService
 * @package App\Services\Shop\Catalog
 */
class CategoriesService
{
    /**
     * @param array $data
     * @return Category
     */
    public function create(array $data)
    {
        /** @var Category $category */
        $category = Category::create($data);

        return $category;
    }

    /**
     * @param array $data
     * @param Request $request
     * @return bool
     */
    public function update(Category $category, array $data)
    {
        $result = $category->update($data);

        return $result;
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function delete(Category $category)
    {
        $result = $category->delete();

        return $result;
    }
}
