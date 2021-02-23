@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary text-white" href="{{ route('admin.categories.create') }}">Create Root Category</a>
    </div>
    @include('admin.blocks.categories_list')
@stop
