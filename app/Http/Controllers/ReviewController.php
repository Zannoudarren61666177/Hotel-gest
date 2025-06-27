<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Affiche la liste des avis
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('reviews.create');
    }

    // Enregistre un nouvel avis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'hotel_id'   => 'required|exists:hotels,id',
            'note'       => 'required|integer|min:1|max:5',
            'commentaire'=> 'nullable|string',
        ]);
        Review::create($validated);
        return redirect()->route('reviews.index');
    }

    // Affiche un avis
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    // Affiche le formulaire d'édition
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    // Met à jour un avis existant
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'hotel_id'   => 'required|exists:hotels,id',
            'note'       => 'required|integer|min:1|max:5',
            'commentaire'=> 'nullable|string',
        ]);
        $review->update($validated);
        return redirect()->route('reviews.index');
    }

    // Supprime un avis
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index');
    }
}