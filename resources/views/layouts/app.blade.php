<!DOCTYPE html>
<html>
<head>
    <title>Gestion Hôtels</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <nav>
        <a href="{{ route('hotels.index') }}">Hôtels</a>
        <!-- Ajoute d'autres menus ici -->
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>