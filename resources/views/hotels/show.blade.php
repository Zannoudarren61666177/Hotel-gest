@extends('layouts.app')

@section('content')
    <h1>Détail de l’Hôtel</h1>
    <p><strong>Nom :</strong> {{ $hotel->nom }}</p>
    <p><strong>Adresse :</strong> {{ $hotel->adresse }}</p>
    <a href="{{ route('hotels.index') }}">Retour à la liste</a>
@endsection