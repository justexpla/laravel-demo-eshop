<?php

namespace App\Http\Controllers\Shop\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function index()
    {
        return view('shop.cabinet.index');
    }
}
