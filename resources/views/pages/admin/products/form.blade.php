<form method="POST" action="{{ request()->routeIs('admin.products.edit') ? route('admin.products.update', ['product' => $product->id]) : route('admin.products.store') }}" enctype="multipart/form-data">
    @if(request()->routeIs('admin.products.edit'))
        @method('PUT')
    @endif
    @csrf
    <div class="card-body">
        @if(session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="form-group">
            <label for="exampleInputProductName">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="exampleInputProductName" placeholder="Enter product name" value="{{ request()->routeIs('admin.products.edit') ? $product->name : "" }}">
            @error('product_name')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPrice">Price</label>
            <input type="text" class="form-control" name="price" id="exampleInputPrice" placeholder="Enter price" value="{{ request()->routeIs('admin.products.edit') ? $product->price : "" }}">
            @error('price')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter product description" name="description">
                {{ request()->routeIs('admin.products.edit') ? $product->description : "" }}
            </textarea>
            @error('description')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>Volume</label>
            @foreach($volumes as $volume)
            <div class="form-check">
                @if(request()->routeIs('admin.products.edit'))
                    <input class="form-check-input" type="radio" value="{{ $volume->id }}" id="defaultCheck{{ $volume->id }}" name="volume" {{ $volume->id === $product->volume_id ? "checked" : ""}}>
                @else
                    <input class="form-check-input" type="radio" value="{{ $volume->id }}" id="defaultCheck{{ $volume->id }}" name="volume">
                @endif
                <label class="form-check-label" for="defaultCheck{{ $volume->id }}">
                    {{ $volume->volume }} l
                </label>
            </div>
            @endforeach
            @error('volume')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select brand</label>
            <select class="form-control" id="exampleFormControlSelect1" name="brands">
                <option value="0">Brand</option>
                @foreach($brands as $brand)
                    @if(request()->routeIs('admin.products.edit'))
                        <option value="{{ $brand->id }}" {{ $brand->id === $product->brand_id ? "selected" : "" }}>{{ $brand->name }}</option>
                    @else
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('brands')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="types">
                <option value="0">Select type</option>
                @foreach($types as $type)
                    @if(request()->routeIs('admin.products.edit'))
                        <option value="{{ $type->id }}" {{ $type->id === $product->type_id ? "selected" : "" }}>{{ $type->name }}</option>
                    @else
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('types')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
                <div class="custom-file">
                    @if(request()->routeIs('admin.products.edit'))
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile" value="{{ $product->path ?? "" }}">
                    @else
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                    @endif

                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
            </div>
            @error('image')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
            @if(request()->routeIs('admin.products.edit'))
                <div class="form-group">
                    <img height="200" src="{{ asset('/storage/assets/images/products/'.$product->path) }}" alt="{{ $product->brandName." ".$product->name }}">
                </div>
            @endif
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
