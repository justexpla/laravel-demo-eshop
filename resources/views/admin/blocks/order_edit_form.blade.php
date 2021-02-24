@php /** @var \App\Models\Shop\Product $product */@endphp
<form class="needs-validation" novalidate="" action="{{ route('admin.orders.update', $order) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row g-3">

        <div class="col-12 mt-2">
            <label for="status" class="form-label">Status</label>
            <div class="input-group">
                <select class="form-control" name="status" id="status">
                    @foreach($orderStatuses as $status)
                        <option value="{{ $status }}">{{ __('order.' . $status) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="fullname" class="form-label">Full name</label>
            <div class="input-group">
                <input type="text"
                       class="form-control"
                       id="fullname"
                       placeholder="Full name"
                       required=""
                       name="fullname"
                       value="{{ old('fullname') ?? $order->fullname ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="phone" class="form-label">Phone</label>
            <div class="input-group">
                <input type="number"
                       class="form-control"
                       id="phone"
                       placeholder="Phone"
                       name="phone"
                       value="{{ old('phone') ?? $order->phone ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="email" class="form-label">E-Mail</label>
            <div class="input-group">
                <input type="email"
                       class="form-control"
                       id="email"
                       placeholder="E-Mail"
                       name="email"
                       value="{{ old('email') ?? $order->email ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="address" class="form-label">Address</label>
            <div class="input-group">
                <input type="email"
                       class="form-control"
                       id="address"
                       placeholder="Address"
                       name="address"
                       value="{{ old('address') ?? $order->address ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="commentary" class="form-label">Commentary</label>
            <div class="input-group">
                <textarea type="text"
                       class="form-control"
                       id="commentary"
                       placeholder="Commentary"
                       name="commentary"
                >{{ old('commentary') ?? $order->commentary ?? ''}}</textarea>
            </div>
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
    <div class="text-left">
        <button class="w-25 btn btn-primary btn-lg my-4" type="submit">Edit order</button>
    </div>
</form>
