<?php

namespace App\Menus\Shop\Left;

use App\Repositories\Shop\CategoriesRepository;

/**
 * Left menu with list of categories data
 *
 * Class CategoriesMenu
 * @package App\Menus\Shop\Left
 */
class CategoriesMenu extends BaseLeftMenu
{
    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    public function __construct()
    {
        $this->categoriesRepository = app(CategoriesRepository::class);
    }

    /**
     * @return string
     */
    public function getMenuView(): string
    {
        return 'shop.blocks.leftmenu_catalog';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getMenuData()
    {
        $data = $this->categoriesRepository
            ->getCategoriesAsTree();

        return $data;
    }
}
