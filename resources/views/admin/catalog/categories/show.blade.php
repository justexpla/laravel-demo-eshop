@extends('layouts.admin')

@section('title', $category->title)

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary text-white mr-2" href="{{ route('admin.categories.create', ['parent_id' => $category->id]) }}">Create Children Category</a>
        <a class="btn btn-primary text-white mr-2" href="{{ route('admin.categories.edit', ['category' => $category, 'parent_id' => $category->parent_id]) }}">Edit Category</a>
        <form action="{{ route('admin.categories.destroy', $category) }}" class="d-inline-block mr-2" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger text-white" type="submit">Delete Category</button>
        </form>
    </div>
    @include('admin.blocks.categories_show')
@stop
