@extends('layouts.auth')

@section('title', 'Créer un compte')

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
    .auth-form-box input[type="text"],
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
    .role-select {
        display: flex;
        gap: 60px;
        margin-bottom: 15px;
        font-size: 18px;
        align-items: center;
    }
    .policy {
        display: flex;
        align-items: center;
        margin-bottom: 18px;
        font-size: 15px;
    }
    .auth-btn-register {
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
    .auth-btn-register:hover {
        background: #bababa;
    }
    .auth-btn-register:active {
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
    @media (max-width: 600px) {
        .auth-form-box {
            width: 94vw;
            padding: 18px 3vw 20px 3vw;
        }
        .auth-main-title {
            font-size: 28px;
        }
    }
</style>
<h1 class="auth-main-title">Créer un compte</h1>
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

    <form method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf
        <div class="role-select">
            <label><input type="checkbox" name="role" value="client" {{ old('role') == 'client' ? 'checked' : '' }} onclick="onlyOne(this)"> Je suis un client</label>
            <label><input type="checkbox" name="role" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }} onclick="onlyOne(this)"> Je suis un admin hôtel</label>
        </div>
        <label for="nom">Nom*</label>
        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
        
        <label for="prenom">Prénoms*</label>
        <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
        
        <label for="email">Email*</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        
        <label for="password">Mot de passe*</label>
        <input type="password" id="password" name="password" required autocomplete="new-password">
        
        <label for="password_confirm">Confirmation du mot de passe*</label>
        <input type="password" id="password_confirm" name="password_confirm" required autocomplete="new-password">
        
        <div class="policy">
            <input type="checkbox" name="policy" id="policy" required style="margin-right:8px;" {{ old('policy') ? 'checked' : '' }}>
            <label for="policy" style="margin-bottom:0;">J’accepte les politiques de confidentialités</label>
        </div>
        <button type="submit" class="auth-btn-register">S’inscrire</button>
        <div class="login-link">
            Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
        </div>
    </form>
</div>
<script>
function onlyOne(checkbox) {
    let checkboxes = document.getElementsByName('role');
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false;
    });
}
</script>
@endsection