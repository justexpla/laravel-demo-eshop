@php /** @var \App\Models\Shop\Order $order */ @endphp
<div>
    <div class="my-2">
        <strong>ID: </strong> {{ $order->id }}
    </div>
    <div class="my-2">
        <u><strong>Status: </strong></u> {{ $order->getStatusTitle() }}
    </div>
    @if($order->user)
        <div class="my-2">
            <strong>User: </strong> {{ $order->user_id }}
        </div>
    @endif
    <div class="my-2">
        <strong>Full name: </strong> {{ $order->fullname }}
    </div>
    <div class="my-2">
        <strong>Phone: </strong> {{ $order->phone }}
    </div>
    <div class="my-2">
        <strong>E-Mail </strong> {{ $order->email }}
    </div>
    <div class="my-2">
        <strong>Address: </strong> {{ $order->address }}
    </div>
    <div class="my-2">
        <strong>Created at: </strong> {{ $order->created_at->format('d F Y H:i:s') }}
    </div>
    <div class="my-2">
        <strong>Updated at: </strong> {{ $order->updated_at->format('d F Y H:i:s') }}
    </div>
    <div class="my-2">
        <strong>Commentary: </strong>
        <div>
            {{ $order->commentary }}
        </div>
    </div>
    <div class="my-2">
        <strong>Cart: </strong>
        <div>
            @include('admin.blocks.order_cart_list', ['cart' => $order->cart])
        </div>
    </div>
    <div class="my-2">
        <strong>Total: </strong> {{ $order->total_price }}
    </div>
</div>
