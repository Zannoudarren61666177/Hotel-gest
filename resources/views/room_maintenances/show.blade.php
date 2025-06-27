@extends('layouts.app')

@section('content')
    <h1>Maintenance : {{ $roomMaintenance->nom ?? 'Détail' }}</h1>
    <p>Description : {{ $roomMaintenance->description ?? '-' }}</p>
    <p>Autre champ : {{ $roomMaintenance->autre_champ ?? '-' }}</p>
    <a href="{{ route('room_maintenances.index') }}">Retour à la liste</a>
@endsection