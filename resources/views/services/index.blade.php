@extends('layouts.app')

@section('content')
    <h1>Liste des Services</h1>
    <a href="{{ route('services.create') }}">Ajouter un service</a>
    <ul>
        @foreach($services as $service)
            <li>
                <a href="{{ route('services.show', $service) }}">{{ $service->nom ?? 'Voir' }}</a>
                <a href="{{ route('services.edit', $service) }}">Modifier</a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection