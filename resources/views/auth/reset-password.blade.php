@extends('layouts.auth')

@section('title', 'Réinitialiser le mot de passe')

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
        margin-bottom: 18px;
        background: #d4d4d4;
        border: none;
        font-size: 18px;
        box-sizing: border-box;
        padding-left: 8px;
    }
    .auth-btn-reset {
        display: block;
        margin: 24px auto 0 auto;
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
    @media (max-width:600px) {
        .auth-form-box { width: 95vw; padding: 12px 2vw 16px 2vw; }
        .auth-main-title { font-size: 26px; }
    }
</style>

<h1 class="auth-main-title">Réinitialiser le mot de passe</h1>
<div class="auth-form-box">
    @if ($errors->any())
        <div class="alert-error">
            {{ $errors->first() }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email">Adresse email*</label>
        <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">

        <label for="password">Nouveau mot de passe*</label>
        <input type="password" id="password" name="password" required autocomplete="new-password">

        <label for="password_confirmation">Confirmation du mot de passe*</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">

        <button type="submit" class="auth-btn-reset">Réinitialiser le mot de passe</button>
    </form>
</div>
@endsection