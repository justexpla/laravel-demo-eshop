<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Full name</th>
        <th scope="col">Phone</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Status</th>
        <th scope="col">Total</th>
        <th scope="col">Created at</th>
    </tr>
    </thead>
    <tbody>
    @php /** @var \Illuminate\Pagination\LengthAwarePaginator $orders */ @endphp
    @foreach($orders as $order)
        @php /** @var \App\Models\Shop\Order $order */ @endphp
        <td><a href="{{ route('admin.orders.show', $order) }}">{{ $order->id }}</a></td>
        <td>{{ $order->fullname }}</td>
        <td>{{ $order->phone }}</td>
        <td>{{ $order->email }}</td>
        <td>{{ $order->getStatusTitle() }}</td>
        <td>{{ $order->total_price }}</td>
        <td>{{ $order->created_at->format('d F Y H:i:s') }}</td>
    @endforeach
    </tbody>
</table>
{{ $orders->links() }}
