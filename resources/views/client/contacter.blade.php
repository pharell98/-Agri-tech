@extends('layouts.appClient')
@section('contenu')
    <div class="hero-wrap hero-bread" style="background-image: url('/front/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Dashboard</a></span>
                        <span> Client</span></p>
                    <h1 class="mb-0 bread">Client</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contenu1')
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/css/style.css') }}">
    <div class="user-profile py-120">
        <div class="container">
            <div class="row">
                @include('include.dashboardClient')
                <div class="col-lg-9">


                    <div class=" order-md-last d-flex">
                        <form action="#" class="bg-white p-5 contact-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="7" class="form-control"
                                          placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

