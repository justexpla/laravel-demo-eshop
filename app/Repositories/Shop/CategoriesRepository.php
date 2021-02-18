<?php

namespace App\Repositories\Shop;

use App\Models\Shop\Category as Model;
use Illuminate\Database\Eloquent\Collection;
use Kalnoy\Nestedset\NestedSet;

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
     * @return Collection
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
}
