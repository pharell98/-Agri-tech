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
                                    <div class="form-group">
                                        @if (session()->has('success'))
                                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                                        @endif
                                    </div>
                                    <div class="user-profile-form">
                                        <form action="{{ route('client.update', Auth::user()->id) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nom complet</label>
                                                        <input type="text" name="nomComplet" class="form-control"
                                                               value="{{ Auth::user()->name }}"
                                                               placeholder="Prénom">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="form-control"
                                                               value="{{ Auth::user()->email }}" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" name="tel" class="form-control"
                                                               value="{{ Auth::user()->telephone }}"
                                                               placeholder="Téléphone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" name="adresse" class="form-control"
                                                               value="{{ Auth::user()->adresse }}"
                                                               placeholder="adresse">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="theme-btn my-3"><span
                                                    class="far fa-user"></span> Sauvegarder les modifications
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="user-profile-card">
                                    <h4>Changer le mot de passe</h4>
                                    <div class="form-group">
                                        @if (session()->has('error'))
                                            <div class="alert alert-warning">{{ session()->get('error') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="user-profile-form">
                                            <form action="{{ route('client.updatePass',Auth::user()->id)}}" method="post" id="passwordForm">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" name="old_password" class="form-control"
                                                           placeholder="Old Password" required>
                                                </div>
                                                <div id="error" class="text text-warning" hidden=""></div>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input id="new_pass1" type="password" name="new_pass1"
                                                           class="form-control"
                                                           placeholder="New Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Re-Type Password</label>
                                                    <input id="new_pass2" type="password" name="new_pass2"
                                                           class="form-control"
                                                           placeholder="Re-Type Password" required>
                                                </div>
                                                <button id="submitButton" type="submit" class="theme-btn my-3"><span
                                                        class="fa-solid fa-key"></span> Changer le mots de passe
                                                </button>
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
    <script>
        const newPass1 = document.getElementById('new_pass1');
        const newPass2 = document.getElementById('new_pass2');
        const errorDiv = document.getElementById('error');
        const submitButton = document.getElementById('submitButton');

        // Ajoutez un gestionnaire d'événement input sur les champs de mot de passe
        newPass1.addEventListener('input', validatePasswords);
        newPass2.addEventListener('input', validatePasswords);

        function validatePasswords() {
            const pass1 = newPass1.value;
            const pass2 = newPass2.value;

            // Vérifiez si les valeurs des deux champs sont identiques
            if (pass1 !== pass2) {
                // Affichez le message d'erreur et désactivez le bouton de soumission
                errorDiv.innerText = 'Les mots de passe ne correspondent pas.';
                errorDiv.hidden = false;
                submitButton.disabled = true;
            } else {
                // Les mots de passe correspondent, masquez le message d'erreur et activez le bouton de soumission
                errorDiv.hidden = true;
                submitButton.disabled = false;
            }
        }
    </script>

@endsection

