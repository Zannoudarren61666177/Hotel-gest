@extends('layouts.auth')

@section('title', 'Liste des Hôtels')

@push('styles')
<style>
.form-box {
    /* border: none; */
    background: #fff;
    margin: 42px auto 0 auto;
    padding: 2.2rem 2.4rem 1.6rem 2.4rem;
    max-width: 900px;
    min-width: 320px;
    /* box-shadow: none; */
    border-radius: 0;
}
.form-box h2 {
    text-align: center;
    font-size: 2.2rem;
    font-weight: 600;
    margin-bottom: 0.7rem;
}
.filter-form {
    display: flex;
    gap: 24px;
    margin-bottom: 22px;
    justify-content: center;
    align-items: flex-end;
    flex-wrap: wrap;
    background: #f4f2fa;
    border-radius: 8px;
    padding: 18px 16px 12px 16px;
    box-shadow: 0 1px 8px #b1aed135;
}
.filter-group {
    display: flex;
    flex-direction: column;
    min-width: 170px;
}
.filter-group label {
    font-weight: 500;
    font-size: 1rem;
    margin-bottom: 4px;
    color: #6c63b5;
}
.filter-group input, .filter-group select {
    background: #e9e6f4;
    border: 1.2px solid #b1aed1;
    border-radius: 4px;
    padding: 8px;
    font-size: 1rem;
    transition: border 0.2s;
}
.filter-group input:focus, .filter-group select:focus {
    border: 1.2px solid #6c63b5;
    outline: none;
}
.filter-form button {
    background: #776fa8;
    color: #fff;
    border: none;
    border-radius: 2rem;
    font-size: 1rem;
    font-weight: 500;
    padding: 10px 36px;
    transition: background 0.2s;
    cursor: pointer;
    margin-top: 18px;
}
.filter-form button:hover {
    background: #5a518c;
}
.table-hotels {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1.2rem;
    background: #fff;
}
.table-hotels th, .table-hotels td {
    padding: 10px;
    border-bottom: 1px solid #ececec;
    text-align: left;
    font-size: 1rem;
}
.table-hotels th {
    background: #776fa8;
    color: #fff;
    font-weight: 600;
}
.table-hotels tr:last-child td {
    border-bottom: none;
}
.status-badge {
    display: inline-block;
    font-weight: bold;
    padding: 3px 14px;
    border-radius: 13px;
    font-size: 0.97em;
}
.status-en_attente {
    background: #fff3cd;
    color: #b38d09;
    border: 1.2px solid #ffeeba;
}
.status-actif {
    background: #d4edda;
    color: #278a33;
    border: 1.2px solid #c3e6cb;
}
.status-refuse {
    background: #f8d7da;
    color: #c82333;
    border: 1.2px solid #f5c6cb;
}
.btn-auth {
    background: #776fa8;
    color: #fff;
    border: none;
    padding: 6px 16px;
    border-radius: 4px;
    text-decoration: none;
    margin-right: 4px;
    cursor: pointer;
    transition: background 0.2s;
    font-size: 1rem;
    display: inline-block;
}
.btn-auth:hover {
    background: #5a518c;
}
.btn-danger {
    background: #d9534f;
}
.btn-danger:hover {
    background: #b52c28;
}
@media (max-width: 900px) {
    .form-box { padding: 1.1rem 2vw; max-width: 99vw;}
    .table-hotels th, .table-hotels td { font-size: 0.93rem; padding: 6px; }
}
@media (max-width: 600px) {
    .form-box { min-width: 99vw; }
    .filter-form { flex-direction: column; gap: 10px; align-items: stretch; padding: 10px 4vw;}
    .filter-group { min-width: auto; }
    .table-hotels th, .table-hotels td { font-size: 0.82rem; }
}
</style>
@endpush

@section('content')
<div class="form-box">
    <h2>Liste des Hôtels</h2>

    {{-- Filtre moderne --}}
    <form method="GET" class="filter-form">
        <div class="filter-group">
            <label for="filtre_nom">Nom de l'hôtel</label>
            <input type="text" name="nom" id="filtre_nom" value="{{ request('nom') }}" placeholder="Rechercher par nom">
        </div>
        <div class="filter-group">
            <label for="filtre_statut">Statut</label>
            <select name="statut" id="filtre_statut">
                <option value="">Tous</option>
                <option value="en_attente" @if(request('statut')=='en_attente') selected @endif>En attente</option>
                <option value="actif" @if(request('statut')=='actif') selected @endif>Actif</option>
                <option value="refuse" @if(request('statut')=='refuse') selected @endif>Refusé</option>
            </select>
        </div>
        <button type="submit">Rechercher</button>
    </form>

    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:0.7rem 1.2rem;border-radius:4px;margin-bottom:1rem;border:1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('hotels.create') }}" class="btn-auth" style="margin-bottom:12px;display:inline-block;">Ajouter un hôtel</a>

    <table class="table-hotels">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Type chambre</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->nom }}</td>
                    <td>{{ $hotel->adresse }}</td>
                    <td>{{ $hotel->email }}</td>
                    <td>{{ $hotel->telephone }}</td>
                    <td>{{ ucfirst($hotel->type_chambre) }}</td>
                    <td>
                        <span class="status-badge status-{{ $hotel->statut }}">
                            @if($hotel->statut == 'en_attente') En attente
                            @elseif($hotel->statut == 'actif') Actif
                            @elseif($hotel->statut == 'refuse') Refusé
                            @else {{ $hotel->statut }}
                            @endif
                        </span>
                    </td>
                    <td>
                        @if($hotel->statut == 'en_attente')
                            <form action="{{ route('hotels.validate', $hotel->id) }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit" class="btn-auth">Valider</button>
                            </form>
                        @elseif($hotel->statut == 'actif')
                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn-auth">Modifier</a>
                        @endif
                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-auth btn-danger" onclick="return confirm('Supprimer cet hôtel ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center;color:#c00;">Aucun hôtel trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection