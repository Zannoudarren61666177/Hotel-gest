<?php

namespace App\Http\Controllers;

use App\Models\RoomMaintenance;
use Illuminate\Http\Request;

class RoomMaintenanceController extends Controller
{
    public function index()
    {
        $roomMaintenances = RoomMaintenance::all();
        return view('room_maintenances.index', compact('roomMaintenances'));
    }

    public function create()
    {
        return view('room_maintenances.create');
    }

    public function store(Request $request)
    {
        RoomMaintenance::create($request->all());
        return redirect()->route('room_maintenances.index');
    }

    public function show(RoomMaintenance $roomMaintenance)
    {
        return view('room_maintenances.show', compact('roomMaintenance'));
    }

    public function edit(RoomMaintenance $roomMaintenance)
    {
        return view('room_maintenances.edit', compact('roomMaintenance'));
    }

    public function update(Request $request, RoomMaintenance $roomMaintenance)
    {
        $roomMaintenance->update($request->all());
        return redirect()->route('room_maintenances.index');
    }

    public function destroy(RoomMaintenance $roomMaintenance)
    {
        $roomMaintenance->delete();
        return redirect()->route('room_maintenances.index');
    }
}