<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Authentification')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #f3f3f3;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background: #9b6a6a;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 24px;
            /* pas de padding-top/bottom ici */
        }
        .header-logo img {
            height: 28px;
            display: block;
        }
        .header-nav {
            display: flex;
            align-items: center;
            gap: 48px;
            height: 100%;
        }
        .header-link {
            color: #2d2d2d;
            font-size: 17px;
            font-family: Arial, sans-serif;
            text-decoration: none;
            margin-right: 32px;
            transition: text-decoration 0.2s;
        }
        .header-link:hover {
            text-decoration: underline;
        }
        main {
            min-height: calc(100vh - 124px);
            background: #fff;
            margin: 0 auto;
            padding: 0; /* Aucun padding */
        }
        footer {
            background: #e0e0e0;
            padding: 0;
            position: relative;
            bottom: 0;
            width: 100%;
            height: 52px;
        }
        .footer-links {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .footer-link {
            background: #776fa8;
            color: #fff;
            padding: 7px 26px;
            border-radius: 3px;
            text-decoration: none;
            font-size: 16px;
            margin: 0 16px;
            transition: background 0.2s;
        }
        .footer-link:hover {
            background: #5a518c;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="header-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <nav class="header-nav">
            <a href="{{ url('/home') }}" class="header-link">Accueil</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <!-- FOOTER -->
    <footer>
        <div class="footer-links">
            <a href="#" class="footer-link">Mention Légale</a>
            <a href="#" class="footer-link">Contact</a>
            <a href="#" class="footer-link">Politique de confidentialité</a>
        </div>
    </footer>
    @stack('scripts')
</body>
</html>