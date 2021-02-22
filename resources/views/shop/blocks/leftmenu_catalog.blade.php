<div class="list-group">
    @php /** @var \Illuminate\Database\Eloquent\Collection $categories */ @endphp
    @foreach($items as $category)
        @php /** @var \App\Models\Shop\Category $category*/ @endphp
        @include('shop.blocks.leftmenu_catalog_root-item')
    @endforeach
</div>
