@php /** @var \App\Models\Shop\Product $product*/ @endphp
<div class="row my-4">
    <div class="row">
        <div class="col-lg-6">
            <h2>{{ $product->title }}</h2>
            <hr>
            <h5>
                {{$product->price}} $
            </h5>
            <hr>
            <div>
                <button class="btn btn-success" data-product-id="{{ $product->id }}" data-action="add_to_cart">Add to the card</button>
                <button class="btn btn-danger">Remove from the card</button>
            </div>
        </div>
        <div class="col-lg-6">
            <img class="card-img-top" src="http://placehold.it/700x400" alt="">
        </div>
    </div>
    <div class="col-lg-12 my-4">
        <hr>
        {!! $product->description !!}
    </div>
</div>
<!-- /.row -->
