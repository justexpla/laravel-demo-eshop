<form class="needs-validation" novalidate="" action="{{ route('admin.products.store') }}" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-12 mt-2">
            <label for="is_active" class="form-label">Active</label>
            <div class="input-group d-inline ml-2">
                <input type="checkbox" class="" id="is_active" name="is_active">
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="title" class="form-label">Title</label>
            <div class="input-group">
                <input type="text"
                       class="form-control"
                       id="title"
                       placeholder="Title"
                       required=""
                       name="title"
                       value="{{ old('title') ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="slug" class="form-label">Slug</label>
            <div class="input-group">
                <input type="text"
                       class="form-control"
                       id="slug"
                       placeholder="Slug (optional)"
                       name="slug"
                       value="{{ old('slug') ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="price" class="form-label">Price</label>
            <div class="input-group">
                <input type="number"
                       class="form-control"
                       id="price"
                       placeholder="Price (optional)"
                       name="price"
                       min="0"
                       value="{{ old('price') ?? ''}}"
                >
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="description" class="form-label">Description</label>
            <div class="input-group">
                <textarea type="text"
                       class="form-control"
                       id="description"
                       placeholder="Description"
                       name="description"
                >{{ old('description') ?? ''}}</textarea>
            </div>
        </div>

        <div class="col-12 mt-2">
            <label for="parent" class="form-label">Parent</label>
            <div class="input-group">
                <select name="category_id" id="parent" class="form-control">
                    @foreach($parentCategories as $category)
                        @include('admin.blocks.categories_parent_option_row', ['category' => $category, 'padding' => ''])
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="text-left">
        <button class="w-25 btn btn-primary btn-lg my-4" type="submit">Create product</button>
    </div>
</form>
