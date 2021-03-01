<?php

namespace App\Http\Controllers\Shop\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shop\BaseController;
use Illuminate\Http\Request;

/**
 * Class CabinetController
 * @package App\Http\Controllers\Shop\Cabinet
 */
class CabinetController extends BaseController
{
    /**
     * Index page of user cabinet
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('shop.cabinet.index');
    }
}
