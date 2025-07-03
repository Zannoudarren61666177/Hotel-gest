
@extends('layouts.recherche')
@section('title', 'Résultat de recherche')

@section('content')
    <div style="background:#f5f5f5; min-height:calc(100vh - 124px);">
        <!-- Titre centré -->
        <div style="padding-top:30px; text-align:center;">
            <h2 style="color:#1654b8; font-size:2rem; font-weight:bold; margin-bottom:0;">Résultat de recherche</h2>
        </div>
        <!-- Barre de recherche -->
        <div>
            @include('partials.search-form')
        </div>
        <!-- Grille résultats/filtre -->
        <div class="row" style="max-width:1400px; margin:auto;">
            <!-- Colonne filtre -->
            <div class="col-md-2 d-none d-md-block">
                <div class="bg-light rounded p-3 text-center fw-bold">
                    Filtre populaire
                </div>
            </div>
            <!-- Résultats -->
            <div class="col-md-8">
                @if($hotels->count())
                    @foreach($hotels as $hotel)
                        <div class="bg-white rounded shadow-sm mb-4 p-3 d-flex gap-3 align-items-center" style="border-radius:18px;">
                            <img src="{{ $hotel->image_url ?? asset('images/hotel-default.jpg') }}" 
                                alt="{{ $hotel->nom }}" 
                                style="width:120px;height:100px;object-fit:cover;border-radius:12px;">
                            <div class="flex-grow-1">
                                <div>
                                    <a href="{{ route('hotels.show', $hotel->id) }}" class="fw-bold text-decoration-none" style="color:#4a49a4;">{{ $hotel->nom }}</a>
                                    <span class="text-secondary small ms-2">{{ $hotel->ville ?? '' }} 
                                        @if($hotel->distance)• {{ $hotel->distance }} du centre @endif 
                                        @if($hotel->proximite)• {{ $hotel->proximite }} @endif
                                    </span>
                                </div>
                                <div class="small mt-1">
                                    @if($hotel->type_chambre)
                                        <span class="fw-semibold">{{ $hotel->type_chambre }}</span>
                                    @endif
                                    @if($hotel->details_chambre)
                                        • {{ $hotel->details_chambre }}
                                    @endif
                                </div>
                                <div class="small text-muted">
                                    @if($hotel->prepaiement)
                                        <span class="fw-bold">Prépaiement requis</span>
                                    @endif
                                </div>
                                <div class="mt-2 d-flex align-items-center gap-3">
                                    <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-outline-primary btn-sm">Voir les détails</a>
                                    <div class="fw-bold" style="color:#4a49a4;">
                                        XOF {{ number_format($hotel->prix, 0, ',', ' ') }}
                                    </div>
                                    <div class="small text-secondary">
                                        {{ $hotel->nb_nuits ?? '1 nuit' }}, {{ $hotel->nb_personnes ?? '2 adultes' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center mb-4">
                        <a href="#" class="text-decoration-none fw-semibold" style="color:#4a49a4;">Afficher plus&nbsp;&gt;&gt;&gt;</a>
                    </div>
                @else
                    <div class="alert alert-warning text-center">
                        Aucun hôtel trouvé pour ce lieu.
                    </div>
                @endif
            </div>
            <div class="col-md-2 d-none d-md-block"></div>
        </div>
    </div>
@endsection