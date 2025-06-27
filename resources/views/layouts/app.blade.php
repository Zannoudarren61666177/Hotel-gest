<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Gestion Hôtels</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <nav>
        <a href="{{ route('hotels.index') }}">Hôtels</a>
        <!-- Ajoute d'autres menus ici -->

        <!-- Sélecteur de langue -->
        <form action="{{ route('lang.switch') }}" method="POST" style="display:inline; float: right; margin-left: 1em;">
            @csrf
            <select name="locale" onchange="this.form.submit()" style="padding: 0.25em;">
                <option value="fr" @if(app()->getLocale() === 'fr') selected @endif>Français</option>
                <option value="en" @if(app()->getLocale() === 'en') selected @endif>English</option>
            </select>
        </form>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>