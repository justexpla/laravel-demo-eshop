<?php

namespace App\Services\Shop\Cart;

use Illuminate\Http\Request;

interface ICart
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function add(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function remove(Request $request);

    /**
     * @return mixed
     */
    public function reset();

    /**
     * @return int|float
     */
    public function getTotalPrice();

    public function getContent();
}
