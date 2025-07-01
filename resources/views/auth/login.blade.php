@extends('layouts.auth')

@section('title', 'Page de connexion')

@section('content')
<style>
    .auth-main-title {
        color: #000;
        font-size: 42px;
        font-family: Arial, sans-serif;
        font-weight: normal;
        text-align: center;
        margin-top: 0;
        margin-bottom: 32px;
    }
    .auth-form-box {
        border: 1px solid #7e6dda;
        max-width: 500px;
        margin: 0 auto 40px auto;
        padding: 38px 34px 26px 34px;
        background: #fff;
    }
    .auth-form-box label {
        display: block;
        margin-bottom: 10px;
        font-size: 17px;
        color: #333;
    }
    .auth-form-box input[type="email"],
    .auth-form-box input[type="password"] {
        width: 100%;
        height: 38px;
        margin-bottom: 22px;
        background: #d4d4d4;
        border: none;
        font-size: 18px;
        box-sizing: border-box;
        padding-left: 8px;
    }
    .auth-btn-login {
        display: block;
        margin: 24px auto 18px auto;
        background: #d4d4d4;
        color: #333;
        border: none;
        font-size: 23px;
        padding: 7px 35px;
        border-radius: 24px;
        cursor: pointer;
        box-shadow: none;
        transition: background 0.2s, transform 0.08s, box-shadow 0.08s;
    }
    .auth-btn-login:hover {
        background: #bababa;
    }
    .auth-btn-login:active {
        background: #b0b0b0;
        transform: scale(0.96);
        box-shadow: 0 1px 4px #aaa inset;
    }
    .auth-form-box .forgot-link {
        color: #222;
        font-size: 16px;
        text-align: center;
        display: block;
        margin-bottom: 14px;
        text-decoration: underline;
        cursor: pointer;
        transition: color 0.2s;
    }
    .auth-form-box .forgot-link:hover {
        color: #7e6dda;
    }
    .auth-form-box .signup-link {
        text-align: center;
        font-size: 18px;
        margin-top: 12px;
        font-weight: bold;
        color: #000;
        display: block;
    }
    .auth-form-box .signup-link a {
        color: #000;
        text-decoration: underline;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.2s;
    }
    .auth-form-box .signup-link a:hover {
        color: #7e6dda;
    }
    .auth-form-box .alert-error {
        color: #b20000;
        background: #ffeaea;
        border: 1px solid #e6b6b6;
        border-radius: 7px;
        text-align: center;
        font-size: 16px;
        margin-bottom: 18px;
        padding: 8px 8px;
    }
    .auth-form-box .alert-success {
        color: #1b8a1b;
        background: #e6ffe6;
        border: 1px solid #a3e6a3;
        border-radius: 7px;
        text-align: center;
        font-size: 16px;
        margin-bottom: 18px;
        padding: 8px 8px;
    }
</style>
    <h1 class="auth-main-title">Page de Connexion</h1>
    <div class="auth-form-box">
        {{-- Message de succès --}}
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Adresse mail*</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">

            <label for="password">Mot de passe*</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">

            <button type="submit" class="auth-btn-login">Se connecter</button>
            <a class="forgot-link" href="{{ route('password.request') }}">Mot de passe oublié?</a>
            <div class="signup-link">
                Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a>
            </div>
        </form>
    </div>
@endsection