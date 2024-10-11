<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use Illuminate\Http\Request;

class SkinController extends Controller
{
    /**
     * Display a listing of the skins.
     */
    public function index()
    {
        $skins = Skin::all();
        return view('skins.index', compact('skins'));
    }

    /**
     * Show the form for creating a new skin.
     */
    public function create()
    {
        return view('skins.create');
    }

    /**
     * Store a newly created skin in storage.
     */
    public function store(Request $request)
    {
        Skin::create($request->all());
        return redirect()->route('skins.index');
    }

    /**
     * Display the specified skin.
     */
    public function show(string $id)
    {
        $skin = Skin::find($id);
        return view('skins.show', compact('skin'));
    }

    /**
     * Show the form for editing the specified skin.
     */
    public function edit(string $id)
    {
        $skin = Skin::find($id);
        return view('skins.edit', compact('skin'));
    }

    /**
     * Update the specified skin in storage.
     */
    public function update(Request $request, string $id)
    {
        $skin = Skin::find($id);
        $skin->update($request->all());
        return redirect()->route('skins.index');
    }

    /**
     * Remove the specified skin from storage.
     */
    public function destroy(string $id)
    {
        Skin::find($id)->delete();
        return redirect()->route('skins.index');
    }
}
