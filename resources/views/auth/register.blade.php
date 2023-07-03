@extends('layouts.appLogin')
@section('loginclient')
    <form method="POST" action="{{ route('register') }}" class="signin-form">
        @csrf
        <div class="form-group">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom Complet">

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel"
                   value="{{ old('tel') }}" required autocomplete="tel" autofocus placeholder="Téléphone">

            @error('tel')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                   value="{{ old('adresse') }}" required autocomplete="adresse" autofocus placeholder="Adresse">

            @error('adresse')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   autocomplete="new-password" placeholder="Confirmer password">
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3">S'inscrire</button>
        </div>

    </form>
    <div class="form-group d-md-flex mt-4">
        <p class="mb-4 text-center text-white"><a href="{{route('login')}}">Se connecter</a></p>
    </div>
@endsection
