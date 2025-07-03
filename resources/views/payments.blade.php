@extends('layouts.app')

@section('content')
<style>
    .payment-container {
        max-width: 700px;
        margin: 2.5rem auto;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 18px #0001;
        padding: 0;
    }
    .payment-header {
        text-align: center;
        padding: 2.5rem 1.5rem 0.5rem 1.5rem;
        font-weight: 700;
        font-size: 1.4rem;
    }
    .payment-method-title {
        text-align: center;
        font-weight: 600;
        font-size: 1.15rem;
        margin: 2rem 0 1.5rem 0;
    }
    .payment-buttons {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        align-items: center;
        margin-bottom: 3rem;
    }
    .payment-btn {
        width: 80%;
        max-width: 530px;
        background: #dadada;
        color: #222;
        border: none;
        border-radius: 32px;
        padding: 1.2rem 0;
        font-size: 1.27rem;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.18s;
    }
    .payment-btn:hover {
        background: #c9c9c9;
    }
    .site-footer {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        background: #b3b3b3;
        padding: 0.6rem 1.5rem;
        font-weight: 500;
        margin-top: 0;
    }
    .site-footer a {
        color: #fff;
        background: #7676b8;
        border-radius: 4px;
        padding: 0.4rem 1.2rem;
        text-decoration: none;
        font-size: 1rem;
    }
    .site-footer a:hover { background: #5b5ba6; }
</style>

<div class="payment-container">
    <div class="payment-header">
        Faites vos paiement en toute<br>sécurité
    </div>
    <div class="payment-method-title">
        Paiement via :
    </div>
    <div class="payment-buttons">
        <form action="{{ route('payments.fedapay', $reservation) }}" method="POST" style="width:100%;">
            @csrf
            <button type="submit" class="payment-btn">Fedapay</button>
        </form>
        <form action="{{ route('payments.kkiapay', $reservation) }}" method="POST" style="width:100%;">
            @csrf
            <button type="submit" class="payment-btn">Kkiapay</button>
        </form>
    </div>
</div>

<footer class="site-footer">
    <a href="#">Mention Légale</a>
    <a href="#">Contact</a>
    <a href="#">Politique de confidentialité</a>
</footer>
@endsection