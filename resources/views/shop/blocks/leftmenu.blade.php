<div class="list-group">

    @foreach($categories as $category)
        @php /** @var \App\Models\Shop\Category $category*/ @endphp
        @include('shop.blocks.leftmenu_root-item')
    @endforeach
</div>
