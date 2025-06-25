<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    public function index()
    {
        $equipements = Equipement::all();
        return view('equipements.index', compact('equipements'));
    }

    public function create()
    {
        return view('equipements.create');
    }

    public function store(Request $request)
    {
        Equipement::create($request->all());
        return redirect()->route('equipements.index');
    }

    public function show(Equipement $equipement)
    {
        return view('equipements.show', compact('equipement'));
    }

    public function edit(Equipement $equipement)
    {
        return view('equipements.edit', compact('equipement'));
    }

    public function update(Request $request, Equipement $equipement)
    {
        $equipement->update($request->all());
        return redirect()->route('equipements.index');
    }

    public function destroy(Equipement $equipement)
    {
        $equipement->delete();
        return redirect()->route('equipements.index');
    }
}