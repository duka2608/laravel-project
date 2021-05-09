@extends('layouts.client-layout')

@section('title')
    Login
@endsection

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset("assets/images/bg_2.jpg") }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Log in <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Log in</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper px-md-4">
                        <div class="row no-gutters">
                            <div class="col-md-7">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <h3 class="mb-4">Log in</h3>
                                    <form method="POST" action="{{ route('login') }}" id="contactForm" name="contactForm" class="contactForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="email">E - mail</label>
                                                    <input type="text" class="form-control" name="email" id="email" placeholder="E - mail">
                                                </div>
                                                @error('email')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                                </div>
                                                @error('password')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                                @if(session()->has('error_message'))
                                                    <p class="text text-danger">{{ session()->get('error_message') }}</p>
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Log in" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>

                                        <p>
                                            Don't have an account yet?  <a href="{{ route('registration.form') }}">Sign Up</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 order-md-first d-flex align-items-stretch">
                                <div id="map" class="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
