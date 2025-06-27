@extends('layouts.app')

@section('content')
    <h1>Modifier le service</h1>
    <form method="POST" action="{{ route('services.update', $service) }}">
        @csrf
        @method('PUT')
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $service->nom }}" required>
        <label>Description :</label>
        <textarea name="description">{{ $service->description }}</textarea>
        <label>Autre champ :</label>
        <input type="text" name="autre_champ" value="{{ $service->autre_champ }}">
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('services.index') }}">Annuler</a>
@endsection