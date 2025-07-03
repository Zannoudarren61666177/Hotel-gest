<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();

        // Filtre par nom (recherche partielle)
        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        // Filtre par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $hotels = $query->get();

        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:30',
            'description' => 'required|string',
            'type_chambre' => 'required|string|in:standard,luxe,suite',
            'image' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        // Stockage de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hotels', 'public');
            $validated['image_url'] = $path;
        }

        // Création de l’hôtel
        Hotel::create([
            'nom' => $validated['nom'],
            'adresse' => $validated['adresse'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'description' => $validated['description'],
            'type_chambre' => $validated['type_chambre'],
            'image_url' => $validated['image_url'] ?? null,
            'statut' => 'en_attente', // par défaut "en attente" à la création
        ]);

        return redirect()->route('hotels.index')->with('success', 'Hôtel ajouté !');
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        // Validation
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:30',
            'description' => 'required|string',
            'type_chambre' => 'required|string|in:standard,luxe,suite',
            'image' => 'nullable|image|mimes:jpeg,png|max:2048',
            'statut' => 'nullable|in:en_attente,actif,refuse'
        ]);

        // Si une nouvelle image est envoyée
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hotels', 'public');
            $validated['image_url'] = $path;
        }

        $hotel->update($validated);

        return redirect()->route('hotels.index')->with('success', 'Hôtel mis à jour !');
    }

    public function destroy($id)
    {
        Hotel::destroy($id);
        return redirect()->route('hotels.index')->with('success', 'Hôtel supprimé !');
    }
}