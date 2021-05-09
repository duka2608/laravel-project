<!DOCTYPE html>
<html lang="en">
    @include('fixed.client.head')
<body>
    @include('fixed.client.info')
    @include('fixed.client.navigation')

    @if(!request()->routeIs('show') && !request()->routeIs('contact') && !request()->routeIs('login.form') && !request()->routeIs('registration.form') && !request()->routeIs('cart'))
        @include('fixed.client.slider')
    @endif

    @if(request()->routeIs('home') || request()->routeIs('about'))
        <section class="ftco-intro">
            <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex">
                <div class="intro d-lg-flex w-100 ftco-animate">
                    <div class="icon">
                        <span class="flaticon-support"></span>
                    </div>
                    <div class="text">
                        <h2>Online Support 24/7</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="intro color-1 d-lg-flex w-100 ftco-animate">
                    <div class="icon">
                        <span class="flaticon-cashback"></span>
                    </div>
                    <div class="text">
                        <h2>Money Back Guarantee</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="intro color-2 d-lg-flex w-100 ftco-animate">
                    <div class="icon">
                        <span class="flaticon-free-delivery"></span>
                    </div>
                    <div class="text">
                        <h2>Free Shipping &amp; Return</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>
        <section class="ftco-section ftco-no-pb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('assets/images/about.jpg') }})">
                    </div>
                    <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
                        <div class="heading-section">
                            <span class="subheading">Since 1905</span>
                            <h2 class="mb-4">Desire Meets A New Taste</h2>

                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>
                            <p class="year">
                                <strong class="number" data-number="115">0</strong>
                                <span>Years of Experience In Business</span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section ftco-no-pb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 ">
                        <div class="sort w-100 text-center ftco-animate">
                            <div class="img" style="background-image: url({{ asset('assets/images/kind-1.jpg') }})"></div>
                            <h3>Brandy</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 ">
                        <div class="sort w-100 text-center ftco-animate">
                            <div class="img" style="background-image: url({{ asset('assets/images/kind-2.jpg') }})"></div>
                            <h3>Gin</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 ">
                        <div class="sort w-100 text-center ftco-animate">
                            <div class="img" style="background-image: url({{ asset('assets/images/kind-3.jpg') }})"></div>
                            <h3>Rum</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 ">
                        <div class="sort w-100 text-center ftco-animate">
                            <div class="img" style="background-image: url({{ asset('assets/images/kind-4.jpg') }})"></div>
                            <h3>Tequila</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 ">
                        <div class="sort w-100 text-center ftco-animate">
                            <div class="img" style="background-image: url({{ asset('assets/images/kind-5.jpg') }})"></div>
                            <h3>Vodka</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 ">
                        <div class="sort w-100 text-center ftco-animate">
                            <div class="img" style="background-image: url({{ asset('assets/images/kind-6.jpg') }})"></div>
                            <h3>Whiskey</h3>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif


@yield('content')

@if(request()->routeIs('home') || request()->routeIs('home'))
    @include('fixed.client.happy-customers')
@endif

@include('fixed.client.footer')


<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@include('fixed.client.scripts')

</body>
</html>
