@php /** @var \App\Models\Shop\Category $category*/ @endphp
@php $link = route('shop.catalog.category', ['category' => $category->slug]) @endphp

@if ($category->children->count())
    <div class="list-group-subitem">
        <div class="d-flex">
            <a href="{{ $link }}" class="flex-fill">
                {{ $category->title }}
            </a>
            <button type="button" class="btn btn-sm dropdown-toggle" onclick="$('.submenu-{{ $category->id }}').toggle()">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
        </div>

        <div class="submenu-{{ $category->id }}" style="display: none">
            @foreach($category->children as $subCategory)
                @include('shop.blocks.leftmenu_catalog_sub-item', ['category' => $subCategory])
            @endforeach
        </div>

    </div>
@else
    <a href="{{ $link }}" class="list-group-subitem">
        {{ $category->title }}
    </a>
@endif
