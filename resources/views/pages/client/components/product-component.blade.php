<div class="col-md-4 d-flex">
    <div class="product ftco-animate">
        <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{ asset("storage/assets/images/products/". $product->path )}});">
            <div class="desc">
                <p class="meta-prod d-flex">
                    @if(session()->has('user'))
                        <a href="#" class="d-flex align-items-center justify-content-center add-to-cart" data-product="{{ $product->id }}"><span class="flaticon-shopping-bag"></span></a>
                    @endif
                    <a href="{{ route('show', $product->id) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                </p>
            </div>
        </div>
        <div class="text text-center">
            <span class="category">{{ $product->typeName }}</span>
            <h2>{{ $product->brandName." ".$product->name }}</h2>
            <p class="mb-0">${{ $product->price }}</p>
        </div>
    </div>
</div>
