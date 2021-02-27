<form action="" method="GET" class="col-12 row">
    <div class="col-4">
        <label class="d-inline" for="filter_price">Price:</label>
        <select name="price" id="filter_price" class="form-control d-inline w-75">
            <option value="">No sort</option>
            <option value="asc" @if(request()->get('price') === 'asc') selected @endif>Increase</option>
            <option value="desc" @if(request()->get('price') === 'desc') selected @endif>Decrease</option>
        </select>
    </div>
    {{--<div class="col-4">
        <label class="d-inline" for="filter_price">Show:</label>
        <select name="show" id="filter_price" class="form-control d-inline w-75">
            <option value="15">15</option>
            <option value="30">30</option>
        </select>
    </div>--}}
    <div class="col-2">
        <button type="submit" class="btn btn-primary">Apply filter</button>
    </div>
</form>
