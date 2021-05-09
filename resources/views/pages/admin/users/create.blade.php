@extends('layouts.admin-layout')

@section('header-title')
        Create User Form
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    @if(session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">User info</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('pages.admin.users.form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
