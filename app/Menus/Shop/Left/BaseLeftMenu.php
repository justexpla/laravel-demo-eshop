<?php

namespace App\Menus\Shop\Left;

use App\Menus\Shop\BaseMenu;

abstract class BaseLeftMenu extends BaseMenu
{
    /**
     * Returns namespace of class (it needs for the search of class menus)
     *
     * @return string
     */
    public static function getNamespace()
    {
        return __NAMESPACE__;
    }
}
