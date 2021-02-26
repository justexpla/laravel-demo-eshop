@php /** @var \App\Models\Shop\Category $category */ @endphp
@php /** @var \Kalnoy\Nestedset\Collection $categoryChildren */ @endphp
<div>
    <div class="my-2">
        <strong>ID: </strong> {{ $category->id }}
    </div>
    <div class="my-2">
        <strong>Title: </strong> {{ $category->title }}
    </div>
    <div class="my-2">
        <strong>Slug: </strong> {{ $category->slug }}
    </div>

    @if($categoryChildren->count())
        <div class="my-2">
            <strong>Children: </strong>
            @include('admin.blocks.categories_list', ['categories' => $categoryChildren])
        </div>
    @endif
</div>

