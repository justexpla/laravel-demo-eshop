@extends('layouts.shop')

@section('content')
    @php /** @var \App\Models\Shop\Order $order */ @endphp
    <div class="container my-4">
        <h2>Order</h2>
        <div class="my-2">
            <strong>ID: </strong> {{ $order->id }}
        </div>
        <div class="my-2">
            <strong>Status: </strong> {{ $order->getStatusTitle() }}
        </div>
        <div class="my-2">
            <strong>Full name: </strong> {{ $order->full_name }}
        </div>
        <div class="my-2">
            <strong>E-Mail: </strong> {{ $order->email }}
        </div>
        <div class="my-2">
            <strong>Phone: </strong> {{ $order->phone }}
        </div>
        <div class="my-2">
            <strong>Address: </strong> {{ $order->address }}
        </div>
        <div class="my-2">
            <strong>Commentary: </strong> @if($order->commentary) {{ $order->commentary }} @else <span class="small text-muted">not specified</span> @endif
        </div>
        <div class="my-2">
            <strong>Total: </strong> {{ $order->total_price }}
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                @php /** @var \App\Models\Shop\OrderCart $cartItem */ @endphp
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td><a href="{{ route('shop.catalog.product', $cartItem->product) }}">{{ $cartItem->product->title }}</a></td>
                    <td>{{ $cartItem->price }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>{{ $cartItem->getTotal() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
