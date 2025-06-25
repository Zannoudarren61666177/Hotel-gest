@extends('layouts.app')

@section('content')
    <h1>Détail de l’utilisateur</h1>
    <p><strong>Nom :</strong> {{ $user->name }}</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <a href="{{ route('users.index') }}">Retour à la liste</a>
@endsection