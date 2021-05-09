<form method="POST" action="{{ request()->routeIs('admin.types.edit') ? route('admin.types.update', ['type' => $type->id]) : route('admin.types.store') }}">
    @csrf
    @if(request()->routeIs('admin.types.edit'))
        @method('PUT')
    @endif
    <div class="card-body">
        @if(session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="form-group">
            <label for="typeName">Type Name</label>
            <input type="text" class="form-control" name="type_name" id="typeName" placeholder="Enter drink type" value="{{ request()->routeIs('admin.types.edit') ? $type->name : null }}">
            @error('type_name')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
