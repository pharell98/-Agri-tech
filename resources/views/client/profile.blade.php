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
                            <div class="col-lg-7">
                                <div class="user-profile-card">
                                    <h4 class="user-profile-card-title">Mes infos</h4>
                                    <div class="user-profile-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" class="form-control" value="Antoni"
                                                               placeholder="Nom">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Prénom</label>
                                                        <input type="text" class="form-control" value="Jonson"
                                                               placeholder="Prénom">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control"
                                                               value="antoni@example.com" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" class="form-control"
                                                               value="+2 134 562 458" placeholder="Téléphone">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="theme-btn my-3"><span
                                                    class="far fa-user"></span> Sauvegarder les modifications</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="user-profile-card">
                                    <h4 >Changer le mot de passe</h4>
                                    <div class="col-lg-12">
                                        <div class="user-profile-form">
                                            <form action="#">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" class="form-control"
                                                           placeholder="Old Password">
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control"
                                                           placeholder="New Password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Re-Type Password</label>
                                                    <input type="password" class="form-control"
                                                           placeholder="Re-Type Password">
                                                </div>
                                                <button type="button" class="theme-btn my-3"><span
                                                        class="fa-solid fa-key"></span> Changer le mots de passe</button>
                                            </form>
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

@endsection

