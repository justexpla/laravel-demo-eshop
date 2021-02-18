@extends('layouts.shop')

@section('content')
    <h2 class="my-4">{{ $categoryTitle }}</h2>

    @php /** @var \Illuminate\Pagination\LengthAwarePaginator $products */ @endphp
    <div class="row">
        @foreach($products as $product)
            @include('shop.blocks.catalog_item', ['product' => $product])
        @endforeach

        {{ $products->links() }}
    </div>
    <!-- /.row -->
@endsection
