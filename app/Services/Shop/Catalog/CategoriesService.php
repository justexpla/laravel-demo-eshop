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
     * @param Request $request
     * @return Category
     */
    public function create(Request $request)
    {
        $data = $this->generateModelData($request);

        /** @var Category $category */
        $category = Category::create($data);

        //events

        return $category;
    }

    /**
     * @param Category $category
     * @param Request $request
     * @return bool
     */
    public function update(Category $category, Request $request)
    {
        $data = $this->generateModelData($request);

        $result = $category->update($data);

        //events

        return $result;
    }

    public function delete(Category $category)
    {
        $result = $category->delete();

        //events

        return $result;
    }

    /**
     * Get model's data from request and generate missing parts
     *
     * @param Request $request
     * @return array
     */
    private function generateModelData(Request $request): array
    {
        $data = $request->except(['_token']);

        if (! $data['slug']) {
            $data['slug'] = Str::slug($data['title']);
        }

        return $data;
    }
}
