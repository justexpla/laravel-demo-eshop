@extends('layouts.shop')

@section('content')
    @php /** @var \App\Models\Shop\Order $order */ @endphp
    <div class="container my-4">
        <h2>Order</h2>
        @include('shop.blocks.cabinet_order_show')

        @include('shop.blocks.cabinet_order_cart_list', ['cartItems' => $cartItems])
    </div>
@endsection
