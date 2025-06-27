@extends('layouts.app')

@section('content')
    <h1>Modifier l'équipement</h1>
    <form method="POST" action="{{ route('equipements.update', $equipement) }}">
        @csrf
        @method('PUT')
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $equipement->nom }}" required>
        <label>Description :</label>
        <textarea name="description">{{ $equipement->description }}</textarea>
        <label>Autre champ :</label>
        <input type="text" name="autre_champ" value="{{ $equipement->autre_champ }}">
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('equipements.index') }}">Annuler</a>
@endsection