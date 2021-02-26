@extends('layouts.admin')

@section('title', 'Create category')

@section('content')
    <div class="my-2 col-9">
        @include('admin.blocks.categories_create_form')
    </div>
@stop
