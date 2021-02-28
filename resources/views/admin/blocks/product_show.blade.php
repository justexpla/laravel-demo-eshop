@php /** @var \App\Models\Shop\Product $product */ @endphp
<div>
    <div class="my-2">
        <strong>ID: </strong> {{ $product->id }}
    </div>
    <div class="my-2">
        <strong>Active: </strong> @if($product->is_active) <span class="text-green">Active</span> @else <span class="text-red">Unactive</span> @endif
    </div>
    <div class="my-2">
        <strong>Title: </strong> {{ $product->title }}
    </div>
    <div class="my-2">
        <strong>Slug: </strong> {{ $product->slug }}
    </div>
    <div class="my-2">
        <strong>Category: </strong> {{ $product->category->title }}
    </div>
    <div class="my-2">
        <strong>Price: </strong> {{ $product->price }}
    </div>
    <div class="my-2">
        <strong>Created at: </strong> {{ $product->created_at->format('d F Y H:i:s') }}
    </div>
    <div class="my-2">
        <strong>Updated at: </strong> {{ $product->updated_at->format('d F Y H:i:s') }}
    </div>
    <div class="my-2">
        <strong>Description: </strong>
        <div>
            {!! $product->description !!}
        </div>
    </div>
    @if($product->image)
        <div class="my-2">
            <div><strong>Image: </strong></div>
            <img src="{{ Storage::url('/products/' . $product->image) }}" alt="{{ $product->title }}" width="250" height="250">
        </div>
    @endif
</div>
