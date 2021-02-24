@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary text-white" href="{{ route('admin.products.create') }}">Create Product</a>
    </div>
    @include('admin.blocks.products_list')
@stop
