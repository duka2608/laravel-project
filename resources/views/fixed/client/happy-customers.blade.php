<section class="ftco-section testimony-section img" style="background-image: url({{ asset("assets/images/bg_4.jpg") }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-3">Happy Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    @foreach($clients as $client)
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                            <div class="text">
                                <p class="mb-4">{{ $client['comment'] }}</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url( {{ asset("assets/images/".$client['image']) }})"></div>
                                    <div class="pl-3">
                                        <p class="name">{{ $client['name'] }}</p>
                                        <span class="position">{{ $client['position'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
