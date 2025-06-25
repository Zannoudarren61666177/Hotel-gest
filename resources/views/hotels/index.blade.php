@extends('layouts.app')

@section('content')
    <h1>Liste des Hôtels</h1>
    <a href="{{ route('hotels.create') }}">Ajouter un hôtel</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->nom }}</td>
                    <td>{{ $hotel->adresse }}</td>
                    <td>
                        <a href="{{ route('hotels.show', $hotel->id) }}">Voir</a>
                        <a href="{{ route('hotels.edit', $hotel->id) }}">Éditer</a>
                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection