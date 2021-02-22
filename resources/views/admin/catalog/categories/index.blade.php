@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary text-white">Create Root Category</a>
    </div>
    @include('admin.blocks.categories_list')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
