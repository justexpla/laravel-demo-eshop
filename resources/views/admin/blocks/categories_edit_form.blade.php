@php /** @var \App\Models\Shop\Category $category*/ @endphp
<form class="needs-validation" novalidate="" action="{{ route('admin.categories.update', $category) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row g-3">
        <div class="col-12 mt-2">
            <label for="title" class="form-label">Title</label>
            <div class="input-group">
                <input type="text"
                       class="form-control"
                       id="title"
                       placeholder="Title"
                       required=""
                       name="title"
                       value="{{ old('title') ?? $category->title ?? ''}}"
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
                       value="{{ old('slug') ?? $category->slug ?? ''}}"
                >
            </div>
        </div>


        <div class="col-12 mt-2">
            <label for="parent" class="form-label">Parent</label>
            <div class="input-group">
                <select name="parent_id" id="parent" class="form-control">
                    <option value="">Root Category</option>
                    @foreach($parentCategories as $category)
                        @include('admin.blocks.categories_parent_option_row', ['category' => $category, 'padding' => ''])
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="text-left">
        <button class="w-25 btn btn-primary btn-lg my-4" type="submit">Edit category</button>
    </div>
</form>
