@extends('layouts.app')

@section('content')
    <h1>Ajouter un Hôtel</h1>
    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" required>
        <br>
        <label>Adresse :</label>
        <input type="text" name="adresse" required>
        <br>
        <button type="submit">Enregistrer</button>
    </form>
@endsection