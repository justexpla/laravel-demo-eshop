@php /** @var \App\Models\Shop\Product $product */@endphp
@php $link = route('shop.catalog.product', ['product' => $product->slug]) @endphp
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        @if($product->image && Storage::exists('/products_resized/' . $product->image))
            <a href="{{ $link }}"><img class="card-img-top" src="{{ Storage::url('/products_resized/' . $product->image) }}" alt="{{ $product->title }}"></a>
        @else
        <a href="{{ $link }}"><img class="card-img-top" src="http://placehold.it/700x400" alt="{{ $product->title }}"></a>
        @endif
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
