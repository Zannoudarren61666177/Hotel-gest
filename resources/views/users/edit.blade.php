@extends('layouts.app')

@section('content')
    <h1>Éditer l’utilisateur</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nom :</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <br>
        <label>Email :</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <br>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection