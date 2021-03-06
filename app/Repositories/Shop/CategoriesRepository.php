<?php

namespace App\Repositories\Shop;

use App\Models\Shop\Category;
use App\Models\Shop\Category as Model;
use Illuminate\Database\Eloquent\Collection;
use Kalnoy\Nestedset\NestedSet;

/**
 * Class CategoriesRepository
 * @package App\Repositories\Shop
 */
class CategoriesRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * Get all categories as nested tree
     *
     * @return \Kalnoy\Nestedset\Collection
     */
    public function getCategoriesAsTree()
    {
        $data = $this->startConditions()
            ->select(['id', 'title', 'slug', NestedSet::PARENT_ID, NestedSet::LFT, NestedSet::RGT])
            ->with(['children'])
            ->get()
            ->toTree();

        return $data;
    }

    /**
     * Get subcategories of given category as a nested tree
     *
     * @param Model $model
     * @return \Kalnoy\Nestedset\Collection
     */
    public function getChildrenForCategoryAsTree(Model $model)
    {
        $data = $model->descendants()
            ->select(['id', 'title', 'slug', NestedSet::PARENT_ID, NestedSet::LFT, NestedSet::RGT])
            ->get()
            ->toTree();

        return $data;
    }
}
