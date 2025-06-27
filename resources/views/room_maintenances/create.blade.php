@extends('layouts.app')

@section('content')
    <h1>Créer une maintenance de chambre</h1>
    <form method="POST" action="{{ route('room_maintenances.store') }}">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" required>
        <label>Description :</label>
        <textarea name="description"></textarea>
        <label>Autre champ :</label>
        <input type="text" name="autre_champ">
        <button type="submit">Enregistrer</button>
    </form>
    <a href="{{ route('room_maintenances.index') }}">Annuler</a>
@endsection