@extends('adminlte::page')

@section('title', "Admin - " . env('APP_NAME'))

@section('content_header')
    <h1>@yield('title')</h1>

    <div>
        @if(session()->get('status'))
            <div class="alert alert-success my-2">{{ session()->get('status') }}</div>
        @endif
            @if(session()->get('status-danger'))
                <div class="alert alert-danger my-2">{{ session()->get('status-danger') }}</div>
            @endif
        @if($errors->count())
            <div class="alert alert-danger my-2">{{ $errors->first() }}</div>
        @endif
    </div>

    @yield('content_header_additional')
@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
