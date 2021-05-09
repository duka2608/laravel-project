@extends('layouts.client-layout')

@section('title')
    Cart
@endsection

@section('content')
@endsection
<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Cart <i class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">My Cart</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    @if(session()->has('cartContent'))
        <div class="container">
        <div class="row">
            <div class="table-wrap">
                <table class="table">
                    <thead class="thead-primary">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>total</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(session()->get('cartContent') as $cartEl)
                        @component('pages.client.components.cartProduct', ['cartEl' => $cartEl])
                        @endcomponent
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        @php
                            $subtotal = 0;
                            foreach (session()->get('cartContent') as $cartEl) {
                                $subtotal = (int)($subtotal + ($cartEl->quantity * $cartEl->product->price));
                            }
                        @endphp
                        <span>Subtotal</span>
                        <span>${{ $subtotal }}</span>
                    </p>
                    <p class="d-flex">
                        @php
                            $delivery = (int)3;
                        @endphp
                        <span>Delivery</span>
                        <span>${{ $delivery }}</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>${{ $subtotal + $delivery }}</span>
                    </p>
                </div>
                <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
    @else
        <div class="container">
            <h1>Your cart is empty.</h1>
        </div>
    @endif
</section>
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.close').click(deleteFromCart);
            $('.quantity').blur(changeQuantity);
        })

        function changeQuantity() {
            let id = $(this).data('product');
            let quantity = $(this).val();
            let token = "{{ csrf_token() }}";

            $.ajax({
                url: '/cart',
                method: 'PUT',
                data: {
                    '_token': token,
                    id,
                    quantity
                },
                success: function (data) {
                    console.log(data);
                },
                error: function(xhr, message, error) {
                    console.log(error);
                }
            })
        }

        function deleteFromCart() {
            let token = "{{ csrf_token() }}";
            let id = $(this).data('product');

            $.ajax({
                url: '/cart/' + id,
                method: 'DELETE',
                data: {
                    '_token': token
                },
                success: function (data) {
                    console.log(data);
                },
                error: function(xhr, message, error) {
                    console.log(error);
                }
            })
        }
    </script>
@endsection
