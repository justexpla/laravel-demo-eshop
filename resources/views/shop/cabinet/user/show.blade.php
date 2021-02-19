@extends('layouts.shop')

@section('content')
    <div class="container my-4">
        <h2>User profile</h2>
        <div class="my-4">
            <a href="{{ route('shop.cabinet.user.edit') }}">Edit profile</a>
        </div>
        <div class="my-2">
            <strong>Login: </strong> {{ $user->name }}
        </div>
        <div class="my-2">
            <strong>E-Mail: </strong> {{ $user->email }}
        </div>
        <div class="my-2">
            <strong>Full name: </strong> @if($user->fullname) {{ $user->fullname }} @else <span class="small text-muted">not specified</span> @endif
        </div>
        <div class="my-2">
            <strong>Phone: </strong> @if($user->phone) {{ $user->phone }} @else <span class="small text-muted">not specified</span> @endif
        </div>
        <div class="my-2">
            <strong>Address: </strong> @if($user->address) {{ $user->address }} @else <span class="small text-muted">not specified</span> @endif
        </div>
    </div>
@endsection
