@php /** @var \App\Models\Shop\Product $product */@endphp
@php $link = route('shop.catalog.product', ['product' => $product->slug]) @endphp
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <a href="{{ $link }}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ $link }}">{{ $product->title }}</a>
            </h4>
            <h5>$ {{ $product->price }}</h5>
            <p class="card-text">{{ $product->getShortDescription() }}</p>
        </div>
        {{--<div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>--}}
    </div>
</div>
