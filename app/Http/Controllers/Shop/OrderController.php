<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\CreateRequest;
use App\Services\Shop\Cart\ICart;
use App\Services\Shop\Cart\ShoppingCartService;
use App\Services\Shop\Order\OrdersService;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    /**
     * @var OrdersService
     */
    private $orderService;
    /**
     * @var ICart
     */
    private $cartService;

    public function __construct()
    {
        $this->orderService = app(OrdersService::class);
        $this->cartService = app(ShoppingCartService::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('shop.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $result = $this->orderService->create($request);

        if ($result) {
            $this->cartService->reset();
            //redirect to payment page
            return redirect()->route('shop.index')->with([
                'status' => 'Thank you for your order! We will contact you as soon as possible'
            ]);
        } else {
            return back()->with([
                'errors' => 'Something went wrong. Please contact administrator'
            ]);
        }
    }
}
