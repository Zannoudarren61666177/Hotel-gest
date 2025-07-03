@extends('layouts.auth')

@section('title', 'Inscription Hôtel')

@push('styles')
<style>
.form-box {
    border: 1.5px solid #6c63b5;
    background: #fff;
    margin: 42px auto 0 auto;
    padding: 2.2rem 2.4rem 1.6rem 2.4rem;
    max-width: 600px;
    min-width: 320px;
    box-shadow: 0 2px 18px #0001;
    border-radius: 0;
}
.form-box h2 {
    text-align: center;
    font-size: 2.2rem;
    font-weight: 600;
    margin-bottom: 0.7rem;
}
.form-box .section-title {
    text-align: center;
    font-weight: bold;
    font-size: 1.13rem;
    margin-bottom: 1.2rem;
}
.form-label {
    font-weight: 500;
    margin-bottom: 0.25rem;
}
.form-control, .form-select {
    width: 100%;
    background: #dddddd;
    border: none;
    border-radius: 2px;
    padding: 0.65rem 0.7rem;
    font-size: 1rem;
    margin-bottom: 1.1rem;
    box-sizing: border-box;
}
.form-control:focus, .form-select:focus {
    outline: 2px solid #6c63b5;
    background: #eaeaea;
}
.btn-form {
    width: 100%;
    background: #cccccc;
    color: #222;
    border: none;
    border-radius: 2rem;
    font-size: 1.2rem;
    font-weight: 500;
    padding: 0.54rem 0;
    margin-top: 0.5rem;
    margin-bottom: 0.8rem;
    transition: background 0.2s;
    cursor: pointer;
}
.btn-form:hover {
    background: #b1aed1;
    color: #222;
}
@media (max-width: 700px) {
    .form-box { padding: 1.1rem 2vw; max-width: 97vw;}
}
</style>
@endpush

@section('content')
<div class="form-box">
    <h2>Inscription Hôtel</h2>
    <div class="section-title">******Informations hôtel******</div>

    {{-- Affichage erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger" style="color:#b52c28; margin-bottom:1rem;">
            <ul class="mb-0" style="padding-left:1.2em;">
                @foreach ($errors->all() as $error)
                    <li style="font-size:0.97rem;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nom" class="form-label">Nom hôtel*</label>
        <input type="text" class="form-control" id="nom" name="nom" required value="{{ old('nom') }}">

        <label for="adresse" class="form-label">Adresse*</label>
        <input type="text" class="form-control" id="adresse" name="adresse" required value="{{ old('adresse') }}">

        <label for="email" class="form-label">Email hôtel*</label>
        <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">

        <label for="telephone" class="form-label">Téléphone hôtel*</label>
        <input type="text" class="form-control" id="telephone" name="telephone" required value="{{ old('telephone') }}">

        <label for="description" class="form-label">Description*</label>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>

        <label for="type_chambre" class="form-label">Type de chambre*</label>
        <select name="type_chambre" id="type_chambre" class="form-select" required>
            <option value="">-- Sélectionner --</option>
            <option value="standard" @if(old('type_chambre')=='standard') selected @endif>Standard</option>
            <option value="luxe" @if(old('type_chambre')=='luxe') selected @endif>Luxe</option>
            <option value="suite" @if(old('type_chambre')=='suite') selected @endif>Suite</option>
        </select>

        <label for="image" class="form-label">Images(png/jpeg)*</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg" required>

        <button type="submit" class="btn-form">Ajouter</button>
    </form>
</div>
@endsection