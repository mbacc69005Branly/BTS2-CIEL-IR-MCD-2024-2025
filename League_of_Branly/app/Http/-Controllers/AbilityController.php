<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    /**
     * Display a listing of the abilities.
     */
    public function index()
    {
        $abilities = Ability::all();
        return view('abilities.index', compact('abilities'));
    }

    /**
     * Show the form for creating a new ability.
     */
    public function create()
    {
        return view('abilities.create');
    }

    /**
     * Store a newly created ability in storage.
     */
    public function store(Request $request)
    {
        Ability::create($request->all());
        return redirect()->route('abilities.index');
    }

    /**
     * Display the specified ability.
     */
    public function show(string $id)
    {
        $ability = Ability::find($id);
        return view('abilities.show', compact('ability'));
    }

    /**
     * Show the form for editing the specified ability.
     */
    public function edit(string $id)
    {
        $ability = Ability::find($id);
        return view('abilities.edit', compact('ability'));
    }

    /**
     * Update the specified ability in storage.
     */
    public function update(Request $request, string $id)
    {
        $ability = Ability::find($id);
        $ability->update($request->all());
        return redirect()->route('abilities.index');
    }

    /**
     * Remove the specified ability from storage.
     */
    public function destroy(string $id)
    {
        Ability::find($id)->delete();
        return redirect()->route('abilities.index');
    }
}
