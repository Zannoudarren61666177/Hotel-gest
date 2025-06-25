<?php

namespace App\Http\Controllers;

use App\Models\HistoriqueAction;
use Illuminate\Http\Request;

class HistoriqueActionController extends Controller
{
    public function index()
    {
        $historiqueActions = HistoriqueAction::all();
        return view('historique_actions.index', compact('historiqueActions'));
    }

    public function create()
    {
        return view('historique_actions.create');
    }

    public function store(Request $request)
    {
        HistoriqueAction::create($request->all());
        return redirect()->route('historique_actions.index');
    }

    public function show(HistoriqueAction $historiqueAction)
    {
        return view('historique_actions.show', compact('historiqueAction'));
    }

    public function edit(HistoriqueAction $historiqueAction)
    {
        return view('historique_actions.edit', compact('historiqueAction'));
    }

    public function update(Request $request, HistoriqueAction $historiqueAction)
    {
        $historiqueAction->update($request->all());
        return redirect()->route('historique_actions.index');
    }

    public function destroy(HistoriqueAction $historiqueAction)
    {
        $historiqueAction->delete();
        return redirect()->route('historique_actions.index');
    }
}