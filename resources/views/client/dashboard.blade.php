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
                    <div class="user-profile-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="dashboard-widget dashboard-widget-color-1">
                                    <div class="dashboard-widget-info">
                                        <h1>10 </h1>
                                        <span>Nombre de commande</span>
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <i class="fa-solid fa-list"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="dashboard-widget dashboard-widget-color-2">
                                    <div class="dashboard-widget-info">
                                        <h1>1250</h1>
                                        <span>Total dépenser</span>
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <i class="fa-solid fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-profile-card">
                                    <h4 class="user-profile-card-title">Historique des Résevations</h4>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>Info Voiture</th>
                                                <th>Date Réservation</th>
                                                <th>Trajet</th>
                                                <th>Prix</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="table-list-info">


                                                        <div class="table-list-content">
                                                            <h6>Mercedes Benz Taxi</h6>
                                                            <span>Booking ID: #123456</span>
                                                        </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>24 February, 2023</span>
                                                    <p>03:15 PM</p>
                                                </td>
                                                <td>
                                                    77 Sunshine
                                                </td>
                                                <td>$650</td>
                                                <td><span class="badge badge-danger">Annulé</span></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

