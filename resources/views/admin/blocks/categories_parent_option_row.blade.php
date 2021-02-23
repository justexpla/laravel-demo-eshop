@php /** @var \App\Models\Shop\Category $category */ @endphp

<option @if(request()->get('parent_id') == $category->id) selected @endif
        value="{{ $category->id }}"
>
    {{$padding ?? ''}}{{ $category->title }} [{{ $category->id }}]
</option>

@if($category->children->count())
    @php $padding .= '| '; @endphp
    @foreach($category->children as $subCategory)
        @include('admin.blocks.categories_parent_option_row', ['category' => $subCategory, 'padding' => $padding])
    @endforeach
@endif
