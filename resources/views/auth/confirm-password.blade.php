@extends('layouts.auth')

@section('title', 'Confirmer le mot de passe')

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
    .auth-form-box .auth-info {
        color: #555;
        font-size: 17px;
        margin-bottom: 24px;
        text-align: center;
    }
    .auth-form-box label {
        display: block;
        margin-bottom: 10px;
        font-size: 17px;
        color: #333;
    }
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
    .auth-btn-confirm {
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
    .auth-btn-confirm:hover {
        background: #bababa;
    }
    .auth-btn-confirm:active {
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
</style>
    <h1 class="auth-main-title">Confirmer le mot de passe</h1>
    <div class="auth-form-box">
        <div class="auth-info">
            Cette zone de l’application est sécurisée. Veuillez confirmer votre mot de passe avant de continuer.
        </div>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <label for="password">Mot de passe*</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">

            <button type="submit" class="auth-btn-confirm">Confirmer</button>

            <div class="login-link">
                <a href="{{ route('password.request') }}">Mot de passe oublié&nbsp;?</a>
            </div>
        </form>
    </div>
@endsection