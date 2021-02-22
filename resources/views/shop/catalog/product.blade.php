@extends('layouts.shop')

@section('content')
    @php /** @var \App\Models\Shop\Product $product*/ @endphp
    @include('shop.blocks.product.show')
@endsection
