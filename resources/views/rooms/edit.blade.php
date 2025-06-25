@extends('layouts.app')

@section('content')
    <h1>Modifier la chambre</h1>
    <form method="POST" action="{{ route('rooms.update', $room) }}">
        @csrf
        @method('PUT')
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $room->nom }}" required>
        <label>Description :</label>
        <textarea name="description">{{ $room->description }}</textarea>
        <label>Autre champ :</label>
        <input type="text" name="autre_champ" value="{{ $room->autre_champ }}">
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('rooms.index') }}">Annuler</a>
@endsection