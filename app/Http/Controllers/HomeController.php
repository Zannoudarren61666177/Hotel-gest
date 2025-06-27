<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Récupération des 5 hôtels actifs les mieux notés (en vedette)
        $featuredHotels = Hotel::where('statut', 'actif')
            ->orderByDesc('score')
            ->take(5)
            ->get();

        // Calcul de la note globale (moyenne des notes des avis)
        $noteGlobale = Review::avg('note');
        // Nombre total d'avis
        $nombreAvis = Review::count();
        // Récupération des 3 avis les plus récents
        $avisRecents = Review::where('statut', 'publie')
            ->latest('date')
            ->take(3)
            ->get();

        // Comptage des notes 1 à 5 pour le diagramme
        $notes = Review::selectRaw('note, count(*) as total')
            ->groupBy('note')
            ->pluck('total', 'note')
            ->toArray();

        $notesCount = [
            5 => $notes[5] ?? 0,
            4 => $notes[4] ?? 0,
            3 => $notes[3] ?? 0,
            2 => $notes[2] ?? 0,
            1 => $notes[1] ?? 0,
        ];

        // Passage des données à la vue
        return view('home', compact(
            'featuredHotels',
            'noteGlobale',
            'nombreAvis',
            'avisRecents',
            'notesCount'
        ));
    }
}