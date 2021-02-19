@extends('layouts.shop')

@section('content')
    <div class="container my-4">
        <form class="needs-validation" novalidate="" action="{{ route('shop.cabinet.user.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <h4 class="mb-3">Login data</h4>

                <div class="col-12 mt-2">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <input type="text"
                               class="form-control"
                               id="username"
                               placeholder="Username"
                               required=""
                               name="name"
                               value="{{ old('username') ?? $user->name ?? ''}}"
                        >
                        <div class="invalid-feedback">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           placeholder="you@example.com"
                           name="email"
                           required
                           value="{{ old('email') ?? $user->email ?? ''}}"
                    >
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="mb-3 my-4">Order data</h4>

                <div class="col-12">
                    <label for="address" class="form-label">Full name</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           placeholder="John B. Smith"
                           required=""
                           name="fullname"
                           value="{{ old('fullname') ?? $user->fullname ?? ''}}"
                    >
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <label for="address" class="form-label">Phone</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           placeholder="+7 (999) 999-99-99"
                           required=""
                           name="phone"
                           value="{{ old('phone') ?? $user->phone ?? ''}}"
                    >
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <label for="address" class="form-label">Address</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           placeholder="1234 Main St"
                           required=""
                           name="address"
                           value="{{ old('address') ?? $user->address ?? ''}}"
                    >
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

            </div>

            <button class="w-25 btn btn-primary btn-lg my-4" type="submit">Edit profile</button>
        </form>
    </div>
@endsection
