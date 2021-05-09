@extends('layouts.client-layout')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset("assets/images/bg_2.jpg") }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="{{ route('products') }}">Products <i class="fa fa-chevron-right"></i></a></span> <span>Products Single <i class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Products Single</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{ asset("storage/assets/images/products/". $product->path) }}" class="image-popup prod-img-bg"><img src="{{ asset("storage/assets/images/products/". $product->path) }}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{ $product->brandName." ".$product->name." - ".$product->volume." l" }}</h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                    </p>
                </div>
                <p class="price"><span>${{ $product->price }}</span></p>
                <p> {{ $product->description }}</p>
                <div class="row mt-4">
                    <div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" id="minus" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="fa fa-minus"></i>
	                	</button>
	            		</span>
                        <input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
	                	<button type="button" id="plus" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="fa fa-plus"></i>
	                 </button>
	             	</span>
                    </div>
                    <div class="w-100"></div>
                </div>
                <p><a href="#" class="btn btn-primary py-3 px-5 mr-2 add-to-cart" data-product="{{ $product->id }}">Add to Cart</a></p>
            </div>
        </div>




        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>

                    <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>

                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

                </div>
            </div>
            <div class="col-md-12 tab-wrap">

                <div class="tab-content bg-light" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <div class="p-4">
                            <h3 class="mb-4">{{ $product->brandName." ".$product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                        <div class="p-4">
                            <h3 class="mb-4">Manufactured By Liquor Store</h3>
                            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                        <div class="row p-4">
                            <div class="col-md-7">
                                <h3 class="mb-4">23 Reviews</h3>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">Jacob Webb</span>
                                            <span class="text-right">25 April 2020</span>
                                        </h4>
                                        <p class="star">
								   				<span>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
							   					</span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                    </div>
                                </div>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">Jacob Webb</span>
                                            <span class="text-right">25 April 2020</span>
                                        </h4>
                                        <p class="star">
								   				<span>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
							   					</span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                    </div>
                                </div>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">Jacob Webb</span>
                                            <span class="text-right">25 April 2020</span>
                                        </h4>
                                        <p class="star">
								   				<span>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
								   					<i class="fa fa-star"></i>
							   					</span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="rating-wrap">
                                    <h3 class="mb-4">Give a Review</h3>
                                    <p class="star">
							   				<span>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					(98%)
						   					</span>
                                        <span>20 Reviews</span>
                                    </p>
                                    <p class="star">
							   				<span>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					(85%)
						   					</span>
                                        <span>10 Reviews</span>
                                    </p>
                                    <p class="star">
							   				<span>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					(98%)
						   					</span>
                                        <span>5 Reviews</span>
                                    </p>
                                    <p class="star">
							   				<span>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					(98%)
						   					</span>
                                        <span>0 Reviews</span>
                                    </p>
                                    <p class="star">
							   				<span>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					<i class="fa fa-star"></i>
							   					(98%)
						   					</span>
                                        <span>0 Reviews</span>
                                    </p>
                                </div>
                            </div>
                        </div>
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
            $('.add-to-cart').click(addToCart);
            $('#minus').click(function () {
                let current = $('#quantity').val();
                if(current <= 0){
                    $('#quantity').val(0);
                }else {
                    $('#quantity').val(current-1);
                }
            });

            $('#plus').click(function () {
                let current = parseInt($('#quantity').val());
                $('#quantity').val(current + 1);
            })
        })

        function addToCart(e) {
            e.preventDefault();
            let id = $(this).data('product');
            let quantity = $('#quantity').val();
            let token = "{{ csrf_token() }}"

            $.ajax({
                url: '/addToCart',
                method: 'POST',
                data: {
                    "_token": token,
                    id,
                    quantity
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
    </script>
@endsection
