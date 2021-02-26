<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
    </tr>
    </thead>
    <tbody>
    @php /** @var \Kalnoy\Nestedset\Collection $categories */ @endphp
    @foreach($categories as $category)
        @php /** @var \App\Models\Shop\Category $category */ @endphp
        @include('admin.blocks.categories_list_row', ['category' => $category])
    @endforeach
    </tbody>
</table>
