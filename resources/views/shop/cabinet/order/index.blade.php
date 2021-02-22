@extends('layouts.shop')

@section('content')
    <div class="container my-4">
        <h2>Orders</h2>
        @include('shop.blocks.cabinet_order_list', ['orders' => $orders])
    </div>
@endsection
