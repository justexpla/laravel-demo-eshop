<?php

namespace App\Menus\Shop;

abstract class BaseMenu
{
    /**
     * view for the menu
     *
     * @return string
     */
    abstract public function getMenuView(): string;

    /**
     * returns items for the menu
     *
     * @return mixed
     */
    abstract public function getMenuData();
}
