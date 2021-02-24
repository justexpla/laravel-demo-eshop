@extends('layouts.admin')

@section('title', 'Order')

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary text-white mr-2" href="{{ route('admin.orders.edit', $order) }}">Edit order</a>
    </div>
    @include('admin.blocks.order_show')
@stop
