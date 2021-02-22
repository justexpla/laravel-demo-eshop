<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Created at</th>
        <th scope="col">Status</th>
        <th scope="col">Total</th>
        <th scope="col">Details</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        @php /** @var \App\Models\Shop\Order $order */ @endphp
        <tr>
            <td scope="row">{{ $order->id }}</td>
            <td>{{ $order->created_at->format('d F Y H:i:s') }}</td>
            <td>{{ $order->getStatusTitle() }}</td>
            <td>{{ $order->total_price }}</td>
            <td><a href="{{ route('shop.cabinet.orders.show', $order->id) }}">Details</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
