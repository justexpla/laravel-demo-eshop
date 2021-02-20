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
        <tr id="row-{{ $row['id'] }}">
            <td>{{ $loop->iteration }}</td>
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
    <strong>Total: <span id="cart_total">{{ \Cart::getTotal() }}</span></strong>
</div>
