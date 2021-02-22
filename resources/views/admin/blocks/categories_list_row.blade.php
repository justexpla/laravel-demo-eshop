@php /** @var \App\Models\Shop\Category $category */ @endphp
<tr>
    <td class="border-0"><a href="{{ route('admin.categories.show', $category) }}">{{ $category->id }}</a></td>
    <td class="border-0"><a href="{{ route('admin.categories.show', $category) }}">{{ $category->title }}</a></td>
    <td class="border-0">{{ $category->slug }}</td>
</tr>
@if($category->children->count())
    <tr>
        <td colspan="3" class="border-right-0 border-top-0 border-bottom-0 border-left p-0 m-0">
            <div class="ml-4">
                <table class="table border-0 mb-0">
                    @foreach($category->children as $subCategory)
                        @include('admin.blocks.categories_list_row', ['category' => $subCategory])
                    @endforeach
                </table>
            </div>
        </td>
    </tr>
@endif
