<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Active</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
    </tr>
    </thead>
    <tbody>
    @php /** @var \Kalnoy\Nestedset\Collection $products */ @endphp
    @foreach($products as $product)
        @php /** @var \App\Models\Shop\Product $product */ @endphp
        <tr @if(! $product->is_active) style="opacity: 0.6;" @endif>
            <td>
                <a href="{{ route('admin.products.show', $product) }}">{{ $product->id }}</a>
            </td>
            <td>{{ $product->is_active }}</td>
            <td>
                <a href="{{ route('admin.products.show', $product) }}">{{ $product->title }}</a>
            </td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->getShortDescription() }}</td>
            <td>
                <a href="{{ route('admin.categories.show', $product->category) }}">{{ $product->category->title }}</a>
            </td>
            <td>{{ $product->price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->links() }}
