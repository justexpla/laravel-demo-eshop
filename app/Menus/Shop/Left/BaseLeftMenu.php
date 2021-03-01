<?php

namespace App\Menus\Shop\Left;

use App\Menus\Shop\BaseMenu;

/**
 * Class BaseLeftMenu
 * @package App\Menus\Shop\Left
 */
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
