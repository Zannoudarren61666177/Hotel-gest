@extends('layouts.auth')

@section('title', 'Vérification de l\'email')

@section('content')
<style>
    .auth-main-title {
        color: #000;
        font-size: 36px;
        font-family: Arial, sans-serif;
        text-align: center;
        margin-top: 0;
        margin-bottom: 28px;
        font-weight: normal;
    }
    .auth-form-box {
        border: 1px solid #7e6dda;
        max-width: 500px;
        margin: 0 auto 40px auto;
        padding: 34px 32px 26px 32px;
        background: #fff;
        border-radius: 4px;
    }
    .auth-form-box .info-message {
        color: #333;
        font-size: 17px;
        margin-bottom: 22px;
        text-align: center;
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
    .auth-form-box .auth-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
    }
    .auth-form-box .auth-btn {
        background: #d4d4d4;
        color: #333;
        border: none;
        font-size: 20px;
        padding: 8px 30px;
        border-radius: 22px;
        cursor: pointer;
        box-shadow: none;
        font-weight: bold;
        transition: background 0.2s, transform 0.08s, box-shadow 0.08s;
    }
    .auth-form-box .auth-btn:hover {
        background: #bababa;
    }
    .auth-form-box .auth-btn:active {
        background: #b0b0b0;
        transform: scale(0.96);
        box-shadow: 0 1px 4px #aaa inset;
    }
    .auth-form-box .logout-link {
        background: none;
        color: #7e6dda;
        border: none;
        font-size: 16px;
        text-decoration: underline;
        cursor: pointer;
        padding: 0;
        margin-left: 18px;
        transition: color 0.2s;
    }
    .auth-form-box .logout-link:hover {
        color: #32286d;
    }
    @media (max-width:600px) {
        .auth-form-box { width: 95vw; padding: 12px 2vw 16px 2vw; }
        .auth-main-title { font-size: 26px; }
    }
</style>

<h1 class="auth-main-title">Vérifiez votre adresse email</h1>
<div class="auth-form-box">

    <div class="info-message">
        Merci pour votre inscription !<br>
        Avant de commencer, veuillez vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer.<br>
        Si vous n'avez pas reçu l'email, nous pouvons vous en renvoyer un.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert-success">
            Un nouveau lien de vérification a été envoyé à votre adresse email.
        </div>
    @endif

    <div class="auth-actions">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="auth-btn">
                Renvoyer l'email de vérification
            </button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-link">
                Se déconnecter
            </button>
        </form>
    </div>
</div>
@endsection