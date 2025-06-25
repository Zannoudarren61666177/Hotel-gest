<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        Hotel::create($request->all());
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
        $hotel->update($request->all());
        return redirect()->route('hotels.index')->with('success', 'Hôtel mis à jour !');
    }

    public function destroy($id)
    {
        Hotel::destroy($id);
        return redirect()->route('hotels.index')->with('success', 'Hôtel supprimé !');
    }
}