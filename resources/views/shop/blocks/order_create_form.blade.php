<form class="needs-validation" novalidate="" action="{{ route('shop.order.store') }}" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-12 mt-2">
            <label for="fullname" class="form-label">Full name</label>
            <div class="input-group has-validation">
                <input type="text"
                       class="form-control"
                       id="fullname"
                       placeholder="Full name"
                       required=""
                       name="fullname"
                       value="{{ old('fullname') ?? auth()->user()->fullname ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="phone" class="form-label">Phone</label>
            <div class="input-group has-validation">
                <input type="text"
                       class="form-control"
                       id="phone"
                       placeholder="Phone"
                       required=""
                       name="phone"
                       value="{{ old('phone') ?? auth()->user()->phone ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="email" class="form-label">E-Mail</label>
            <div class="input-group has-validation">
                <input type="email"
                       class="form-control"
                       id="email"
                       placeholder="E-Mail"
                       required=""
                       name="email"
                       value="{{ old('email') ?? auth()->user()->email ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="address" class="form-label">Address</label>
            <div class="input-group has-validation">
                <input type="text"
                       class="form-control"
                       id="address"
                       placeholder="Address"
                       required=""
                       name="address"
                       value="{{ old('address') ?? auth()->user()->address ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="commentary" class="form-label">Commentary</label>
            <div class="input-group has-validation">
                        <textarea type="text"
                                  class="form-control"
                                  id="commentary"
                                  placeholder="Commentary"
                                  name="commentary"
                                  rows="5"
                        >{{ old('commentary') ?? auth()->user()->commentary ?? ''}}</textarea>
            </div>
        </div>
    </div>
    <div class="text-right">
        <button class="w-25 btn btn-primary btn-lg my-4" type="submit">Make order</button>
    </div>
</form>
