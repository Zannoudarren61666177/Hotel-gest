@extends('layouts.app')

@section('content')
    <h1>Liste des maintenances de chambre</h1>
    <a href="{{ route('room_maintenances.create') }}">Ajouter une maintenance</a>
    <ul>
        @foreach($roomMaintenances as $roomMaintenance)
            <li>
                <a href="{{ route('room_maintenances.show', $roomMaintenance) }}">{{ $roomMaintenance->nom ?? 'Voir' }}</a>
                <a href="{{ route('room_maintenances.edit', $roomMaintenance) }}">Modifier</a>
                <form action="{{ route('room_maintenances.destroy', $roomMaintenance) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection