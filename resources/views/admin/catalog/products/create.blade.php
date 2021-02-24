@extends('layouts.admin')

@section('title', 'Create product')

@section('content')
    <div class="my-2 col-9">
        @include('admin.blocks.products_create_form')
    </div>
@stop
