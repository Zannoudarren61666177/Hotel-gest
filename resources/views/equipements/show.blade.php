@extends('layouts.app')

@section('content')
    <h1>Équipement : {{ $equipement->nom ?? 'Détail' }}</h1>
    <p>Description : {{ $equipement->description ?? '-' }}</p>
    <p>Autre champ : {{ $equipement->autre_champ ?? '-' }}</p>
    <a href="{{ route('equipements.index') }}">Retour à la liste</a>
@endsection