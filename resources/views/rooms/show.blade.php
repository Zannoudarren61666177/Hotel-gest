@extends('layouts.app')

@section('content')
    <h1>Chambre : {{ $room->nom ?? 'Détail' }}</h1>
    <p>Description : {{ $room->description ?? '-' }}</p>
    <p>Autre champ : {{ $room->autre_champ ?? '-' }}</p>
    <a href="{{ route('rooms.index') }}">Retour à la liste</a>
@endsection