@extends('layouts.app')

@section('content')
    <h1>Créer une chambre</h1>
    <form method="POST" action="{{ route('rooms.store') }}">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" required>
        <label>Description :</label>
        <textarea name="description"></textarea>
        <label>Autre champ :</label>
        <input type="text" name="autre_champ">
        <button type="submit">Enregistrer</button>
    </form>
    <a href="{{ route('rooms.index') }}">Annuler</a>
@endsection