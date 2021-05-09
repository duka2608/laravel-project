@extends('layouts.client-layout')

@section('title')
    About me
@endsection

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset("assets/images/bg_2.jpg") }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="{{ route('creator') }}">About me <i class="fa fa-chevron-right"></i></a></span> <span>Products Single <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">About me</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset("storage/assets/images/dusko-stupar.jpeg") }}" class="image-popup prod-img-bg"><img src="{{ asset("storage/assets/images/dusko-stupar.jpeg") }}" class="img-fluid" alt="Creator"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>Dusko Stupar</h3>
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
                    <p> Studenat</p>
                </div>
            </div>
        </div>
    </section>
@endsection
