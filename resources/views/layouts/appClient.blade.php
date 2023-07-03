<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="{{ asset('front/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('front/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" crossorigin="anonymous">

</head>
<body class="goto-here">
<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Agri-Tech</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="{{ route('shops.index')}}" class="nav-link">shop</a></li>

                <li class="nav-item cta cta-colored"><a href="{{ route('paniers.index')}}" class="nav-link"><span
                            class="icon-shopping_cart"></span>[{{ Session::has('panier')?Session::get('panier')->totalQty:0}}]</a></li>
                @guest()
                    <li class="nav-item active"><a href="{{route('login')}}" class="nav-link">Se connecter</a></li>
                    <li class="nav-item active"><a href="{{route('register')}}" class="nav-link">S'inscrire</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="https://cdn-icons-png.flaticon.com/512/1246/1246314.png?w=740&t=st=1680149247~exp=1680149847~hmac=8ff84a45878bf3bf27eade4b9f4c69d983555645a8a94865e66d34a53048a969"
                                 alt="" width="20" height="20" class="rounded-circle me-2">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('client.dashboard') }}"
                               style="color:  rgba(1, 4, 136, 0.9);">
                                Mon Compte
                            </a>
                            <a class="dropdown-item" style="color:  rgba(1, 4, 136, 0.9);" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Deconnexion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

{{-- Start content--}}


@yield('contenu')

@yield('contenu1')



<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/js/aos.js') }}"></script>
<script src="{{ asset('front/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('front/js/scrollax.min.js') }}"></script>
<script src="{{ asset('front/js/google-map.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@yield('script')

</body>
</html>

