<?php

namespace App\Http\Controllers\Shop\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shop\BaseController;
use Illuminate\Http\Request;

class CabinetController extends BaseController
{
    public function index()
    {
        return view('shop.cabinet.index');
    }
}
