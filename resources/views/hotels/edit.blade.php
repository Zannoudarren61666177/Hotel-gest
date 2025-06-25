@extends('layouts.app')

@section('content')
    <h1>Éditer l’Hôtel</h1>
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $hotel->nom }}" required>
        <br>
        <label>Adresse :</label>
        <input type="text" name="adresse" value="{{ $hotel->adresse }}" required>
        <br>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection