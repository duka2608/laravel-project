<form method="POST" action="{{ request()->routeIs('admin.brands.edit') ? route('admin.brands.update', ['brand' => $brand->id]) : route('admin.brands.store') }}">
    @csrf
    @if(request()->routeIs('admin.brands.edit'))
        @method('PUT')
    @endif
    <div class="card-body">
        @if(session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="form-group">
            <label for="brandName">Brand Name</label>
            <input type="text" class="form-control" name="brand_name" id="brandName" placeholder="Enter brand name" value="{{ request()->routeIs('admin.brands.edit') ? $brand->name : null }}">
            @error('brand_name')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
