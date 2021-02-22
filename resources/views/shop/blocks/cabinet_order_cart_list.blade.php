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
            <td>
                @if($cartItem->product)
                    <a href="{{ route('shop.catalog.product', $cartItem->product) }}">{{ $cartItem->product->title }}</a>
                @else
                    <span class="text-muted">Deleted product</span>
                @endif
            </td>
            <td>{{ $cartItem->price }}</td>
            <td>{{ $cartItem->quantity }}</td>
            <td>{{ $cartItem->getTotal() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
