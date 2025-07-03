<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Review;

class ClientController extends Controller
{
    /**
     * Affiche la page d'accueil personnalisée du client connecté.
     */
    public function home()
    {
        // Récupère l'utilisateur connecté (sera null si pas connecté)
        $user = auth()->user();

        // Hôtels mis en avant (exemple: 3 au hasard)
        $featuredHotels = Hotel::inRandomOrder()->take(3)->get();

        // Statistiques des avis (reviews)
        $noteGlobale = Review::avg('note') ?? 0;
        $nombreAvis = Review::count();
        $notesCount = [
            5 => Review::where('note', 5)->count(),
            4 => Review::where('note', 4)->count(),
            3 => Review::where('note', 3)->count(),
            2 => Review::where('note', 2)->count(),
            1 => Review::where('note', 1)->count(),
        ];
        $avisRecents = Review::orderBy('created_at', 'desc')->take(5)->get();

        // On passe toutes les données à la vue
        return view('client.home', compact(
            'user',
            'featuredHotels',
            'noteGlobale',
            'nombreAvis',
            'notesCount',
            'avisRecents'
        ));
    }
}