<style>
#search-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 18px;
    margin: 36px auto 32px auto;
    flex-wrap: nowrap;
    width: 100%;
    box-sizing: border-box;
}
#search-bar input,
#search-bar select {
    padding: 0.7em 1.2em;
    border: 1px solid #b5b5b5;
    border-radius: 6px;
    font-size: 1.2rem;
    background: #fff;
    color: #111;
    min-width: 180px;
    max-width: 240px;
    font-family: inherit;
    font-weight: 400;
    box-sizing: border-box;
}
#search-bar select {
    min-width: 140px;
}
#search-bar button {
    background: #1654b8;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 0.7em 2em;
    font-size: 1.2rem;
    font-family: inherit;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
    white-space: nowrap;
}
#search-bar button:hover {
    background: #14479b;
}
@media (max-width: 900px) {
    #search-bar {
        flex-wrap: wrap;
        gap: 10px;
        justify-content: flex-start;
    }
    #search-bar input, #search-bar select, #search-bar button {
        min-width: 120px;
        font-size: 1rem;
    }
}
</style>

<form id="search-bar" action="{{ route('hotels.recherche') }}" method="GET" autocomplete="off">
    <input 
        type="text" 
        name="lieu" 
        placeholder="Lieu" 
        value="{{ old('lieu', $lieu ?? '') }}"
    >
    <input 
        type="text" 
        name="date_arrivee" 
        placeholder="Date d'arrivée" 
        id="date_arrivee" 
        value="{{ old('date_arrivee', $date_arrivee ?? '') }}"
        readonly
    >
    <input 
        type="text" 
        name="date_depart" 
        placeholder="Date de départ" 
        id="date_depart" 
        value="{{ old('date_depart', $date_depart ?? '') }}"
        readonly
    >
    <select name="type">
        <option value="">Type</option>
        <option value="standard" @if((old('type', $type ?? ''))=='standard') selected @endif>Standard</option>
        <option value="luxe" @if((old('type', $type ?? ''))=='luxe') selected @endif>Luxe</option>
        <option value="suite" @if((old('type', $type ?? ''))=='suite') selected @endif>Suite</option>
    </select>
    <button type="submit">Rechercher</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/fr.js"></script>
<script>
    flatpickr("#date_arrivee", { dateFormat: "d/m/Y", locale: "fr" });
    flatpickr("#date_depart", { dateFormat: "d/m/Y", locale: "fr" });
</script>