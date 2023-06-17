@extends('layouts.appLogin')
@section('login')
        <form action="#" class="signin-form">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <input id="password-field" type="password" class="form-control" placeholder="Password"
                       required>
                <span toggle="#password-field"
                      class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Se connecter</button>
            </div>

        </form>
        <div class="form-group d-md-flex mt-4">
            <p class="mb-4 text-center text-white">Avez-vous un compte ? <a href="inscrire.html">  Créer</a></p>
        </div>
@endsection
