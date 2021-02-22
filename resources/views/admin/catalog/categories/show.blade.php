@extends('adminlte::page')

@section('title', $category->title)

@section('content_header')
    <h1>{{ $category->title }}</h1>
@stop

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary text-white mr-2">Create Children Category</a>
        <a class="btn btn-primary text-white mr-2">Edit Category</a>
        <a class="btn btn-danger text-white mr-2">Delete Category</a>
    </div>
    @include('admin.blocks.categories_show')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
