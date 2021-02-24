@extends('layouts.admin')

@section('title', 'Edit product')

@section('content')
    <div class="my-2 col-9">
        @include('admin.blocks.products_edit_form')
    </div>
@stop
