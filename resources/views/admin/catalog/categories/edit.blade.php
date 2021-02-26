@extends('layouts.admin')

@section('title', 'Edit category')

@section('content')
    <div class="my-2 col-9">
        @include('admin.blocks.categories_edit_form')
    </div>
@stop
