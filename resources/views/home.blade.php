@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="container py-4">

    <!-- En-tête : logo et menu de navigation -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:40px;">
        <nav>
            <a href="{{ route('home') }}" class="mx-2 text-decoration-none">Accueil</a>
            <a href="{{ route('hotels.recherche') }}" class="mx-2 text-decoration-none">Recherche</a>
            <a href="{{ route('login') }}" class="mx-2 text-decoration-none">Connexion</a>
            <a href="{{ route('register') }}" class="mx-2 text-decoration-none">S’inscrire</a>
            <!-- Sélecteur de langue -->
            <span class="mx-2">
                <form action="{{ route('lang.switch') }}" method="POST" style="display:inline; float: right; margin-left: 1em;">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" style="padding: 0.25em;">
                        <option value="fr" @if(app()->getLocale() === 'fr') selected @endif>Français</option>
                        <option value="en" @if(app()->getLocale() === 'en') selected @endif>English</option>
                    </select>
                </form>
            </span>
        </nav>
    </div>

    <!-- Section de bienvenue -->
    <div class="text-center my-4">
        <h2>Bienvenue sur <span class="fw-bold">Hôtel-Gest</span></h2>
        <div class="mb-2 fs-5 text-secondary">
            Le meilleur de l'hôtel, en quelques clics
        </div>
    </div>

    <!-- Barre de recherche rapide pour filtrer les hôtels -->
  <form action="{{ route('hotels.recherche') }}" method="GET" class="d-flex align-items-end justify-content-center gap-2 mb-4 flex-wrap">
    <input type="text" name="lieu" class="form-control w-auto" placeholder="Lieu" style="max-width: 140px;">
    <input type="text" name="date_arrivee" class="form-control w-auto" placeholder="Date d'arrivée" style="max-width: 140px;" id="date_arrivee">
    <input type="text" name="date_depart" class="form-control w-auto" placeholder="Date de départ" style="max-width: 140px;" id="date_depart">
    <select name="type" class="form-select w-auto" style="max-width: 120px;">
        <option value="">Type</option>
        <option value="standard">Standard</option>
        <option value="luxe">Luxe</option>
        <option value="suite">Suite</option>
    </select>
    <button type="submit" class="btn btn-primary px-4">Rechercher</button>
</form>


    <!-- Affichage des hôtels en vedette avec images dynamiques -->
    <div class="row g-3 mb-4">
        @foreach($featuredHotels as $i => $hotel)
            <div class="col-12 col-md-4">
                <div class="rounded overflow-hidden shadow-sm" style="aspect-ratio: 4/3; background: #eee;">
                    <img 
                        src="{{ $hotel->image_url ?? asset('images/hotel-default.jpg') }}" 
                        alt="{{ $hotel->nom }}" 
                        class="w-100 h-100 object-fit-cover"
                    >
                </div>
            </div>
            @if(($i+1) % 3 == 0 && !$loop->last)
                </div><div class="row g-3 mb-4">
            @endif
        @endforeach
    </div>

    <!-- Présentation des avantages de la plateforme -->
    <div class="row mb-4 text-center">
        <div class="col-md-6 mb-2">
            <div class="bg-light p-3 rounded shadow-sm h-100">
                <ul class="list-unstyled mb-0">
                    <li>Réservation rapide et intuitive</li>
                    <li>Grand choix d'établissements</li>
                    <li>Assistance client 24h/24 et 7j/7</li>
                    <li>Gestion centralisée pour les Hôteliers</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="bg-light p-3 rounded shadow-sm h-100">
                <ul class="list-unstyled mb-0">
                    <li>Sécurité des données renforcée</li>
                    <li>Satisfactions &amp; rapports détaillés</li>
                    <li>Paiement en ligne rapide</li>
                    <li>Service personnalisé</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Boutons pour inciter à l'inscription ou à la connexion -->
    <div class="text-center mb-4">
        <a href="{{ route('register') }}" class="btn btn-light rounded-pill mx-2 px-4 shadow-sm">S’inscrire Hôtel</a>
        <a href="{{ route('login') }}" class="btn btn-light rounded-pill mx-2 px-4 shadow-sm">Se connecter</a>
    </div>

    <!-- Bloc affichant la note globale et les avis clients dynamiques -->
    <div class="row mb-4">
        <div class="col-md-4 text-center">
            <div class="display-4 fw-bold">
                {{ number_format($noteGlobale, 1) }}
            </div>
            <div>
                @for($star=1; $star<=5; $star++)
                    <span class="{{ $star <= round($noteGlobale) ? 'text-warning' : 'text-muted' }}">&#9733;</span>
                @endfor
            </div>
            <div class="text-secondary">
                + {{ $nombreAvis }} avis
            </div>
        </div>
        <div class="col-md-8">
            @php
                $maxCount = max($notesCount) ?: 1;
            @endphp
            @foreach([5,4,3,2,1] as $note)
                <div class="d-flex align-items-center">
                    <span class="me-1">{{ $note }}</span>
                    <div class="progress flex-grow-1 me-2" style="height:8px;">
                        <div 
                            class="progress-bar bg-warning" 
                            style="width: {{ round($notesCount[$note] / $maxCount * 100) }}%">
                        </div>
                    </div>
                    <span class="text-secondary small">{{ $notesCount[$note] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Avis récents dynamiques -->
    <div class="mb-4">
        <div class="mb-2"><strong>Avis récents&nbsp;:</strong></div>
        @foreach($avisRecents as $avis)
            <div class="mb-2">
                <span class="fw-semibold">{{ $avis->auteur ?? ($avis->user->name ?? 'Visiteur') }}</span>
                <span class="text-warning">
                    @for($i=1; $i<=5; $i++)
                        @if($i <= $avis->note)
                            &#9733;
                        @else
                            <span class="text-muted">&#9733;</span>
                        @endif
                    @endfor
                </span>
                <span>{{ $avis->commentaire }}</span>
            </div>
        @endforeach
    </div>

    <footer class="border-top pt-3 mt-4 text-center text-secondary small">
        <a href="#" class="mx-2 text-decoration-none">Mention Légale</a>
        <a href="#" class="mx-2 text-decoration-none">Contact</a>
        <a href="#" class="mx-2 text-decoration-none">Politique de confidentialité</a>
    </footer>
</div>
@endsection