<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        Photo::create($request->all());
        return redirect()->route('photos.index');
    }

    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $photo->update($request->all());
        return redirect()->route('photos.index');
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index');
    }
}