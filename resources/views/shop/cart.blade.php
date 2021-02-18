@extends('layouts.shop')

@section('content')
    @if(! \Cart::isEmpty())
        <table class="table my-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>

            @foreach($cart = \Cart::getContent() as $row)
                @php /** @var Darryldecode\Cart\ItemCollection $row */ @endphp
                <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td>{{$row['name']}}</td>
                    <td>{{$row['price']}}</td>
                    <td>{{$row['quantity']}}</td>
                    <td>{{$row->getPriceSum()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <strong>Total: {{\Cart::getTotal()}}</strong>
        </div>
        <div class="my-2">
            <div class="d-inline-block">
                <button class="btn btn-danger">Clear the basket</button>
            </div>
            <div class="d-inline-block float-right">
                <button class="btn btn-success">Checkout</button>
            </div>
        </div>
    @else
        <div class="my-4 text-center">
            <div>
                <strong>Your cart is empty :(</strong>
            </div>
            <div>
                <a href="{{route('shop.index')}}">Go to catalog</a>
            </div>
        </div>
    @endif
@endsection
