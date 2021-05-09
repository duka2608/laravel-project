@extends('layouts.client-layout')

@section('title')
    Products
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h4 class="product-select">Select Types of Products</h4>
                            <select  id="sort" class="sort">
                                <option value="price-asc">Price low to high</option>
                                <option value="price-desc">Price high to low</option>
                                <option value="name-asc">Name A - Z</option>
                                <option value="name-desc">Name Z - A</option>
                            </select>
                        </div>
                    </div>

                    <div class="row" id="products-row">
                        @foreach($products as $product)
                            @component('pages.client.components.product-component', ['product' => $product])
                            @endcomponent
                        @endforeach
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Product Types</h3>
                            <ul class="p-0">
                                <li>
                                    <div class="form-group">
                                        <input type="radio"  value="0" id="typeRadio0" class="liquor-type" name="liquor-type">
                                        <label for="typeRadio0">All</label>
                                    </div>
                                </li>
                                @foreach($types as $type)
                                    @component('pages.client.components.type', ['type' => $type])
                                    @endcomponent
                                @endforeach
                            </ul>
                        </div>
                        <br/>
                        <div class="categories">
                            <h3>Brands</h3>
                            <ul class="p-0">
                                @foreach($brands as $brand)
                                    @component('pages.client.components.brand', ['brand' => $brand])
                                    @endcomponent
                                @endforeach
                            </ul>
                        </div>
                        <br/>
                        <div class="categories">
                            <h3>Product Sizes</h3>
                            <ul class="p-0">
                                @foreach($volumes as $volume)
                                    @component('pages.client.components.volume', ['volume' => $volume])
                                    @endcomponent
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.liquor-type').click(getAllFilters);
            $('.liquor-brand').click(getAllFilters);
            $('.liquor-volume').click(getAllFilters);
            $('#sort').change(getAllFilters);
            $('.add-to-cart').click(addToCart);
        })

        function addToCart(e) {
            e.preventDefault();
            let id = $(this).data('product');
            let token = "{{ csrf_token() }}"

            $.ajax({
                url: '/addToCart',
                method: 'POST',
                data: {
                    "_token": token,
                    id
                },
                headers: {
                    'Accept': 'application/json'
                },
                success: function (data) {
                    fillNavCart(data);
                },
                error: function (xhr, error, message) {
                    console.log(error);
                }
            })
        }

        function fillNavCart(data) {
            let html = '';
            let cartCount = data.length;

            data.forEach(function (cartEl) {
                html += singleNavCartProduct(cartEl);
            })

            html += `<a class="dropdown-item text-center btn-link d-block w-100" href="{{ route('cart') }}">
                    View All
                    <span class="ion-ios-arrow-round-forward"></span>
                </a>`
            $('#cart-count').html(cartCount);
            $('#nav-cart-content').html(html);
        }

        function singleNavCartProduct(cartEl) {
            let imagePath = "{{ asset("/storage/assets/images/products") }}"  + `/${cartEl.product.path}`;

            return `<div class="dropdown-item d-flex align-items-start" href="#">
                    <div class="img" style="background-image: url(${ imagePath });"></div>
                    <div class="text pl-3">
                        <h4>${ cartEl.product.brandName+" "+cartEl.product.name }</h4>
                        <p class="mb-0"><a href="#" class="price">$${ cartEl.product.price }</a><span class="quantity ml-3">Quantity: ${ cartEl.quantity }</span></p>
                    </div>
                </div>`;
        }

        function getAllFilters() {
            let selectedSort = $("#sort").children("option:selected").val();
            let values = [];
            $('input[name="liquor-volume"]:checked').each(function () {
                values.push(this.value)
            });
            let brands = [];
            $('input[name="liquor-brand"]:checked').each(function () {
                brands.push(this.value)
            });

            let typeId = $('input[name="liquor-type"]:checked').val();
            filterProducts(typeId, values, selectedSort, brands);

        }

        function filterProducts(type, volume, sort, brand) {

            $.ajax({
                url: '/products',
                method: 'get',
                dataType: 'json',
                data: {
                    type,
                    volume,
                    sort,
                    brand
                },
                success: function (data) {
                    console.log(data);
                    displayProducts(data);
                    $('.add-to-cart').click(addToCart);
                },
                error: function (xhr, message, error) {
                    console.log(error);
                }
            })
        }

        function displayProducts(products) {
            let html = '';
            products.forEach( product => {
                html += singleProduct(product)
            })

            $('#products-row').html(html)
        }

        function singleProduct(product) {
            let route = "{{ route('show', ':id') }}";
            route = route.replace(':id', product.id)

            let imagePath = "{{ asset("/storage/assets/images/products") }}"  + `/${product.path}`;
            let session = "{{ session()->has('user') }}"
            //imageRoute = imageRoute.replace(':image', product.path)
            let html = `<div class="col-md-4 d-flex">
                            <div class="product ftco-animated">
                                <div class="img d-flex align-items-center justify-content-center" style="background-image: url(${ imagePath });">
                                    <div class="desc">
                                        <p class="meta-prod d-flex">`
                                            if(session) {
                                                html += `<a href="#" class="d-flex align-items-center justify-content-center add-to-cart" data-product="${ product.id }"><span class="flaticon-shopping-bag"></span></a>`
                                            }
                                           html += `<a href="${ route }" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="text text-center">
                                    <span class="category">${ product.typeName }</span>
                                    <h2>${ product.brandName+" "+product.name }</h2>
                                    <p class="mb-0">$ ${ product.price }</p>
                                </div>
                            </div>
                        </div>`
            return html;
        }
    </script>
@endsection
