<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class SearchController extends Controller
{
    // Affiche le formulaire de recherche (avec la liste des lieux connus)
    public function results(Request $request)
    {
        $lieu = $request->input('lieu');
        $type = $request->input('type');
        $date_arrivee = $request->input('date_arrivee');
        $date_depart = $request->input('date_depart');
        
        $query = \App\Models\Hotel::where('statut', 'actif');
        
        if ($lieu) {
            $query->where('adresse', $lieu);
        }
        if ($type) {
            $query->whereHas('rooms', function($q) use ($type) {
                $q->where('type', $type);
            });
        }
        // Ajoute ici ton filtrage par disponibilité/date si tu as la logique

        $hotels = $query->get();

        $message = null;
        if ($hotels->isEmpty()) {
            $message = "Aucun hôtel trouvé pour ce lieu.";
        }

        return view('search.results', compact('hotels', 'message', 'lieu', 'type', 'date_arrivee', 'date_depart'));
    }
}