@extends('layouts.client-layout')

@section('title')
    Sign in
@endsection

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset("assets/images/bg_2.jpg") }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Sign up <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Sign up</h2>
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
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <h3 class="mb-4">Sign up</h3>
                                    <form method="POST" action="{{ route('registration') }}" id="contactForm" name="contactForm" class="contactForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="first_name">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                                </div>
                                                @error('first_name')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                                </div>
                                                @error('last_name')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="username">Username</label>
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                                </div>
                                                @error('username')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
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
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Sign in" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            Already have an account ?  <a href="{{ route('login.form') }}">Log in</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 order-md-first d-flex align-items-stretch">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
