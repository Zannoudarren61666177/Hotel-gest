@extends('layouts.app')

@section('content')
    <h1>Liste des Équipements</h1>
    <a href="{{ route('equipements.create') }}">Ajouter un équipement</a>
    <ul>
        @foreach($equipements as $equipement)
            <li>
                <a href="{{ route('equipements.show', $equipement) }}">{{ $equipement->nom ?? 'Voir' }}</a>
                <a href="{{ route('equipements.edit', $equipement) }}">Modifier</a>
                <form action="{{ route('equipements.destroy', $equipement) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection