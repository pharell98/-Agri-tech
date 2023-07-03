@extends('layouts.appLogin')
@section('loginclient')
    <div class="form-group">
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
    </div>
    <form method="POST" action="{{ route('login') }}" class="signin-form">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail"
                   name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password-field" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                   required>
            <span toggle="#password-field"
                  class="fa fa-fw fa-eye field-icon toggle-password"></span>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-check-input" type="checkbox" name="remember"
                   id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3">Se connecter</button>
        </div>

    </form>
    <div class="form-group d-md-flex mt-4">
        <p class="mb-4 text-center text-white">Avez-vous un compte ? <a href="{{ route('register') }}"> Créer</a></p>
    </div>
@endsection
