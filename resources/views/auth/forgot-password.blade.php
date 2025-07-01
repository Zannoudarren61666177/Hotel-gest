@extends('layouts.auth')

@section('title', 'Mot de passe oublié')

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
    .auth-form-box input[type="email"] {
        width: 100%;
        height: 38px;
        margin-bottom: 22px;
        background: #d4d4d4;
        border: none;
        font-size: 18px;
        box-sizing: border-box;
        padding-left: 8px;
    }
    .auth-btn-reset {
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
    .auth-btn-reset:hover {
        background: #bababa;
    }
    .auth-btn-reset:active {
        background: #b0b0b0;
        transform: scale(0.96);
        box-shadow: 0 1px 4px #aaa inset;
    }
    .auth-form-box .login-link {
        text-align: center;
        font-size: 18px;
        margin-top: 12px;
        font-weight: bold;
        color: #000;
        display: block;
    }
    .auth-form-box .login-link a {
        color: #000;
        text-decoration: underline;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.2s;
    }
    .auth-form-box .login-link a:hover {
        color: #7e6dda;
    }
    .auth-form-box .status-success {
        color: #1b8a1b;
        font-size: 17px;
        text-align: center;
        margin-bottom: 18px;
    }
    .auth-form-box .error-msg {
        color: #b20000;
        font-size: 16px;
        margin-bottom: 12px;
        display: block;
        text-align: left;
    }
</style>
    <h1 class="auth-main-title">Mot de passe oublié</h1>
    <div class="auth-form-box">
        @if (session('status'))
            <div class="status-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email">Adresse mail*</label>
            <input type="email" id="email" name="email" required autofocus autocomplete="email" value="{{ old('email') }}">
            @error('email')
                <span class="error-msg">{{ $message }}</span>
            @enderror

            <button type="submit" class="auth-btn-reset">Envoyer le lien de réinitialisation</button>

            <div class="login-link">
                <a href="{{ route('login') }}">Retour à la connexion</a>
            </div>
        </form>
    </div>
@endsection