<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Gestion Hôtels</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .input-group {
            display: flex;
            align-items: center;
        }
        .input-group-text {
            background: #fff;
            border: 1px solid #ccc;
            border-right: none;
            border-radius: 4px 0 0 4px;
            padding: 0.45em 0.7em;
            display: flex;
            align-items: center;
        }
        .form-control {
            border-radius: 0 4px 4px 0;
        }
        @media (max-width: 600px) {
            .input-group { width: 100%; }
            .form-control { width: 100%; }
        }
    </style>
</head>
<body>
    @yield('content')

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Langue française pour Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/fr.js"></script>
    <script>
    flatpickr("#date_arrivee", { dateFormat: "d/m/Y", locale: "fr" });
    flatpickr("#date_depart", { dateFormat: "d/m/Y", locale: "fr" });
    </script>
</body>
</html>