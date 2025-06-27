@extends('layouts.app')

@section('content')
    <h1>Modifier la maintenance de chambre</h1>
    <form method="POST" action="{{ route('room_maintenances.update', $roomMaintenance) }}">
        @csrf
        @method('PUT')
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $roomMaintenance->nom }}" required>
        <label>Description :</label>
        <textarea name="description">{{ $roomMaintenance->description }}</textarea>
        <label>Autre champ :</label>
        <input type="text" name="autre_champ" value="{{ $roomMaintenance->autre_champ }}">
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('room_maintenances.index') }}">Annuler</a>
@endsection