@extends('layouts.shop')

@section('content')
    <div class="container my-4">
        <h2>Checkout</h2>
        @include('shop.blocks.order_list')
        @include('shop.blocks.order_create_form')
    </div>
@endsection
