
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
