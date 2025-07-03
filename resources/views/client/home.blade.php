@extends('layouts.app')
@section('title', 'Accueil client')

@section('content')
    <style>
    .bienvenue-block {
        text-align: center;
        margin: 48px 0 32px 0;
    }
    .bienvenue-block h1 {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 0.2em;
    }
    .bienvenue-block p {
        font-size: 1.35rem;
        color: #444;
        margin-bottom: 0;
    }
    .auth-btns {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 44px;
        margin-bottom: 48px;
    }
    .cta-btn, .user-btn {
        background: #1654b8;
        color: #fff;
        border: none;
        border-radius: 30px;
        padding: 0.8em 2.4em;
        font-size: 1.18rem;
        font-family: inherit;
        font-weight: 500;
        cursor: pointer;
        box-shadow: 0 1px 8px #1654b820;
        transition: background 0.18s, transform 0.12s;
        text-decoration: none;
        display: inline-block;
        min-width: 170px;
        text-align: center;
    }
    .cta-btn:hover, .user-btn:hover {
        background: #14479b;
        transform: translateY(-2px) scale(1.04);
        color: #fff;
        text-decoration: none;
    }
    .spaced-section { margin-bottom: 48px; }
    </style>

    <div class="bienvenue-block spaced-section">
        <h1>
            Bienvenu sur Hotel-Gest
            @if($user)
                , {{ $user->prenom }} {{ $user->nom }}
            @endif
        </h1>
        <p>
            @if($user)
                Heureux de vous revoir.<br>
                N’hésitez pas à explorer nos hôtels ou à gérer vos réservations.
            @else
                Découvrez nos hôtels ou inscrivez-vous pour gérer vos réservations.
            @endif
        </p>
    </div>

    <div class="spaced-section">
        @include('partials.search-form')
    </div>

    <!-- Hôtels en vedette, même code -->
    <div class="spaced-section" style="display: flex; flex-wrap: wrap; gap: 32px;">
        @foreach($featuredHotels as $i => $hotel)
            <div style="flex:1 1 320px;min-width:260px;max-width:32%;">
                <div style="border-radius:12px;overflow:hidden;box-shadow:0 2px 8px #ccc2;background:#eee;aspect-ratio:4/3;">
                    <img 
                        src="{{ $hotel->image_url ?? asset('images/hotel-default.jpg') }}" 
                        alt="{{ $hotel->nom }}" 
                        style="width:100%;height:100%;object-fit:cover;"
                    >
                </div>
            </div>
        @endforeach
    </div>

    <!-- Avantages -->
    <div class="spaced-section" style="display:flex;flex-wrap:wrap;gap:32px;">
        <div style="flex:1 1 300px;min-width:240px;">
            <div style="background:#f8f8fc;padding:1.2em 1.4em;border-radius:10px;box-shadow:0 2px 6px #ccc1;">
                <ul style="list-style:none;padding-left:0;margin-bottom:0;">
                    <li>Réservation rapide et intuitive</li>
                    <li>Grand choix d'établissements</li>
                    <li>Assistance client 24h/24 et 7j/7</li>
                    <li>Gestion centralisée pour les Hôteliers</li>
                </ul>
            </div>
        </div>
        <div style="flex:1 1 300px;min-width:240px;">
            <div style="background:#f8f8fc;padding:1.2em 1.4em;border-radius:10px;box-shadow:0 2px 6px #ccc1;">
                <ul style="list-style:none;padding-left:0;margin-bottom:0;">
                    <li>Sécurité des données renforcée</li>
                    <li>Satisfactions &amp; rapports détaillés</li>
                    <li>Paiement en ligne rapide</li>
                    <li>Service personnalisé</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Boutons personnalisés pour le client -->
    @if($user)
    <div class="auth-btns spaced-section">
        <a href="{{ route('reservations.index') }}" class="user-btn">Mes réservations</a>
        <a href="{{ route('logout') }}" class="user-btn"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
           Déconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
    @else
    <div class="auth-btns spaced-section">
        <a href="{{ route('login') }}" class="user-btn">Connexion</a>
        <a href="{{ route('register') }}" class="user-btn">Créer un compte</a>
    </div>
    @endif

    <!-- Note globale et avis, même code -->
    <div class="spaced-section" style="display:flex;flex-wrap:wrap;gap:32px;">
        <div style="flex:1 1 200px;min-width:200px;text-align:center;">
            <div style="font-size:2.7rem;font-weight:bold;">
                {{ number_format($noteGlobale, 1) }}
            </div>
            <div>
                @for($star=1; $star<=5; $star++)
                    <span style="color:{{ $star <= round($noteGlobale) ? '#f8c42b' : '#bbb' }};font-size:1.2em;">&#9733;</span>
                @endfor
            </div>
            <div style="color:#888;">
                + {{ $nombreAvis }} avis
            </div>
        </div>
        <div style="flex:2 1 350px;min-width:280px;">
            @php $maxCount = max($notesCount) ?: 1; @endphp
            @foreach([5,4,3,2,1] as $note)
                <div style="display:flex;align-items:center;margin-bottom:4px;">
                    <span style="margin-right:6px;">{{ $note }}</span>
                    <div style="flex:1;background:#ececec;height:8px;border-radius:4px;overflow:hidden;margin-right:10px;">
                        <div style="background:#f8c42b;height:8px;border-radius:4px;width:{{ round($notesCount[$note] / $maxCount * 100) }}%;"></div>
                    </div>
                    <span style="color:#888;font-size:0.96em;">{{ $notesCount[$note] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Avis récents dynamiques -->
    <div class="spaced-section">
        <div style="margin-bottom:8px;font-weight:600;">Avis récents&nbsp;:</div>
        @foreach($avisRecents as $avis)
            <div style="margin-bottom:8px;">
                <span style="font-weight:500;">
                    {{ $avis->auteur ?? ($avis->user->name ?? 'Visiteur') }}
                </span>
                <span style="color:#f8c42b;">
                    @for($i=1; $i<=5; $i++)
                        @if($i <= $avis->note)
                            &#9733;
                        @else
                            <span style="color:#bbb;">&#9733;</span>
                        @endif
                    @endfor
                </span>
                <span>{{ $avis->commentaire }}</span>
            </div>
        @endforeach
    </div>
@endsection