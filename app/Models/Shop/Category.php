<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NestedSet;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    protected $table = 'shop_categories';

    protected $fillable = [
        'title', 'slug' , 'image', NestedSet::PARENT_ID, NestedSet::LFT, NestedSet::RGT
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Returns ids of children categories
     *
     * @return array
     */
    public function getChildrenIds()
    {
        $this->load('children');

        return $this->descendants()
            ->get()
            ->pluck('id')
            ->toArray();
    }
}