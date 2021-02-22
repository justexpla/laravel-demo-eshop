<?php


namespace App\Menus\Shop\Left;

/**
 * Class CabinetMenu
 * @package App\Menus\Shop\Left
 */
class CabinetMenu extends BaseLeftMenu
{

    /**
     * @inheritDoc
     */
    public function getMenuView(): string
    {
        return 'shop.blocks.leftmenu_cabinet';
    }

    /**
     * @inheritDoc
     */
    public function getMenuData()
    {
        return [
            [
                'name' => 'Home',
                'link' => route('shop.cabinet.index'),
            ],
            [
                'name' => 'Profile',
                'link' => route('shop.cabinet.user.show'),
            ],
            [
                'name' => 'Orders',
                'link' => route('shop.cabinet.orders.index'),
            ]
        ];
    }
}
