<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }

    public function store(Request $request)
    {
        return Permission::create($request->all());
    }

    public function show($id)
    {
        return Permission::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());
        return $permission;
    }

    public function destroy($id)
    {
        Permission::destroy($id);
        return response()->json(['message' => 'Supprimé avec succès']);
    }
}