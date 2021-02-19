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
                    <th scope="col">Actions</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart = \Cart::getContent() as $row)
                    @php /** @var Darryldecode\Cart\ItemCollection $row */ @endphp
                    <tr id="row-{{ $row['id'] }}">
                        <td>{{ $loop->iteration }}</td>
                        <td></td>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['price']}}</td>
                        <td>
                            {{--<button class="btn-sm btn-light d-inline-block"
                                    data-action="add_to_cart"
                                    data-product-id="{{ $row['id'] }}"
                                    data-quantity="1"
                            >+</button>--}}
                            <input type="number" class="form-control pl-2 pr-2"
                                   data-action="update_quantity"
                                   data-product-id="{{ $row['id'] }}"
                                   value="{{$row['quantity']}}"
                                   min="1">
                            {{--<button class="btn-sm btn-light d-inline-block"
                                    data-action="remove_from_cart"
                                    data-product-id="{{ $row['id'] }}"
                                    data-quantity="1">-</button>--}}
                        </td>
                        <td class="action-row">
                            <button class="btn btn-sm btn-danger" data-action="remove_from_cart" data-product-id="{{ $row['id'] }}">Delete</button>
                            <button class="btn btn-sm btn-primary"
                                    data-action="restore_cart_item"
                                    data-product-id="{{ $row['id'] }}"
                                    data-quantity="{{ $row['quantity'] }}"
                                    style="display: none"
                            >Restore</button>
                        </td>
                        <td>{{$row->getPriceSum()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <strong>Total: <span id="cart_total">{{\Cart::getTotal()}}</span></strong>
        </div>
        <div class="my-2">
            <div class="d-inline-block">
                <button class="btn btn-danger" id="reset_cart">Clear the basket</button>
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
