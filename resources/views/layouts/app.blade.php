<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestion Hôtels')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }
        body {
            min-height: 100vh;
            background: #fff;
            font-family: Arial, sans-serif;
        }
        .main-container {
            min-height: calc(100vh - 52px);
            margin: 0 auto;
            padding: 0;
            width: 100%;
            max-width: 1100px;
            box-sizing: border-box;
        }
        header {
            background: #a68080;
            width: 100%;
        }
        .header-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
            box-sizing: border-box;
        }
        .header-logo-img {
            height: 46px;
            width: auto;
            border-radius: 6px;
            display: block;
        }
        .header-links {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        .header-link {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 4px 16px;
            border-radius: 5px;
            transition: background .15s;
        }
        .header-link:hover {
            background: #866060;
        }
        footer {
            background: #e0e0e0;
            width: 100%;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0;
            box-sizing: border-box;
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
        @media (max-width: 1200px) {
            .main-container, .header-container { max-width: 98vw; }
        }
        @media (max-width: 800px) {
            .main-container, .header-container, footer {
                padding-left: 8px;
                padding-right: 8px;
            }
            .header-logo-img {
                height: 36px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Header principal aligné -->
    <header>
        <div class="header-container">
            <!-- Mets ici le chemin de ton logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Logo Hôtel-Gest" class="header-logo-img">
            <nav class="header-links">
                <a href="#" class="header-link">Accueil</a>
                <a href="#" class="header-link">Connexion</a>
                <a href="#" class="header-link">S’inscrire</a>
                <span class="header-link">FR/EN</span>
            </nav>
        </div>
    </header>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <main class="main-container">
        @yield('content')
    </main>

    <footer>
        <div class="footer-links">
            <a href="#" class="footer-link">Mention Légale</a>
            <a href="#" class="footer-link">Contact</a>
            <a href="#" class="footer-link">Politique de confidentialité</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/fr.js"></script>
    @stack('scripts')
</body>
</html>