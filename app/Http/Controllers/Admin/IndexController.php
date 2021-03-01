<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers\Admin
 */
class IndexController extends BaseController
{
    /**
     * Index page of admin section
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.index');
    }
}
