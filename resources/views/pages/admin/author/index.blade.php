@extends('layouts.admin-layout')

@section('header-title')
    Author
@endsection

@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <h3 class="f-w-600">Duško Stupar</h3>
                                    <p>Student</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="m-b-25"> <img src="{{ asset('/assets/images/dusko-stupar.jpeg') }}" width="200px" class="img-radius" alt="User-Profile-Image"> </div>
                                    <div class="row">
                                        <div class="col-l-6">
                                            <p class="m-b-10 f-w-600">E - mail</p>
                                            <h6 class="text-muted f-w-400">dusko.stupar.128.16@ict.edu.rs</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-l-6">
                                            <p class="m-b-10 f-w-600">Broj indeksa</p>
                                            <h6 class="text-muted f-w-400">128/16</h6>
                                        </div>
                                    </div>
                                    <h3 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">O meni</h3>
                                    <div class="row">
                                        <div class="col-l-6">
                                            <p class="m-l-20 m-b-10 f-w-100">
                                                Student sam Visoke ICT škole i nadam se da ću je uskoro završiti.<br/>
                                                Određeno vreme sam bio zaposlen u štampariji, naravno to nije najsrećniji posao
                                                pa se zato nadam da će ovaj sajt da dobije neophodne bodove kako bih izašao na ispit. :D
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background-color: #f9f9fa
        }

        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px
        }

        .m-r-0 {
            margin-right: 0px
        }

        .m-l-0 {
            margin-left: 0px
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#67B26F), to(#4ca2cd));
            background: linear-gradient(to right, #4ca2cd, #67B26F)
        }

        .user-profile {
            padding: 20px 0
        }

        .card-block {
            padding: 1.25rem
        }

        .m-b-25 {
            margin-bottom: 25px
        }

        .img-radius {
            border-radius: 5px
        }

        h6 {
            font-size: 14px
        }

        .card .card-block p {
            line-height: 25px
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
        }

        .card-block {
            padding: 1.25rem
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .card .card-block p {
            line-height: 25px
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .text-muted {
            color: #919aa3 !important
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .f-w-600 {
            font-weight: 600
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .user-card-full .social-link li {
            display: inline-block
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }
    </style>
@endsection
