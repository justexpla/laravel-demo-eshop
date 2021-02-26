<table class="table my-4">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cart as $cartItem)
        @php /** @var \App\Models\Shop\OrderCart $row */ @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <a href="{{ route('admin.products.show', $cartItem->product) }}">
                    {{ $cartItem->product->title }}
                </a>
            </td>
            <td>{{ $cartItem->price }}</td>
            <td>{{ $cartItem->quantity }}</td>
            <td>{{ $cartItem->getTotal() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
