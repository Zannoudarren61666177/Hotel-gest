@extends('layouts.app')

@section('content')
    <h1>Liste des Chambres</h1>
    <a href="{{ route('rooms.create') }}">Ajouter une chambre</a>
    <ul>
        @foreach($rooms as $room)
            <li>
                <a href="{{ route('rooms.show', $room) }}">{{ $room->nom ?? 'Voir' }}</a>
                <a href="{{ route('rooms.edit', $room) }}">Modifier</a>
                <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection