<div class="list-group">
    @php /** @var \Illuminate\Database\Eloquent\Collection $categories */ @endphp
    @foreach($categories as $category)
        @php /** @var \App\Models\Shop\Category $category*/ @endphp
        @include('shop.blocks.leftmenu_root-item')
    @endforeach
</div>
