@extends('layouts.admin')

@section('title', $product->title)

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary text-white mr-2" href="{{ route('admin.products.edit', ['product' => $product, 'parent_id' => $product->category_id]) }}">Edit product</a>
        <form action="{{ route('admin.products.destroy', $product) }}" class="d-inline-block mr-2" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger text-white" type="submit">Delete product</button>
        </form>
    </div>
    @include('admin.blocks.product_show')
@stop
