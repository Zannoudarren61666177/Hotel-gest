@extends('layouts.app')

@section('content')
    <h1>Service : {{ $service->nom ?? 'Détail' }}</h1>
    <p>Description : {{ $service->description ?? '-' }}</p>
    <p>Autre champ : {{ $service->autre_champ ?? '-' }}</p>
    <a href="{{ route('services.index') }}">Retour à la liste</a>
@endsection