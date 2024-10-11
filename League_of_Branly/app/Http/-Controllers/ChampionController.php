<?php

namespace App\Http\Controllers;

use App\Models\Champion;
use App\Models\Gender;
use App\Models\Position;
use App\Models\Species;
use App\Models\Resource;
use App\Models\RangeType;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChampionController extends Controller
{
    /**
     * Display a listing of all champions.
     */
    public function index()
    {
        //$champions = Champion::with(['roles', 'region'])->get();
        $champions = Champion::all();
        return view('champions.index', compact('champions'));
    }

    public function classic()
    {
        $champions = Champion::with(['gender', 'positions', 'species', 'resource', 'rangeType', 'regions'])
            ->get();
        return view('champions.classic', compact('champions'));
    }

    /**
     * Show the form for creating a new champion.
     */
    public function create()
    {
        $genders = Gender::all();
        $positions = Position::all();
        $species = Species::all();
        $resources = Resource::all();
        $rangeTypes = RangeType::all();
        $regions = Region::all();
        $currentYear = date('Y');

        return view('champions.create', compact('genders', 'positions', 'species', 'resources', 'rangeTypes', 'regions', 'currentYear'));
    }

    /**
     * Store a newly created champion in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'release_year' => 'required|integer|min:2009|max:' . date('Y'),
            'gender_id' => 'required|exists:genders,id',
            'species_id' => 'required|exists:species,id',
            'resource_id' => 'required|exists:resources,id',
            'range_type_id' => 'required|exists:range_types,id',
            'positions' => 'required|array',
            'positions.*' => 'exists:positions,id',
            'regions' => 'required|array',
            'regions.*' => 'exists:regions,id',
        ]);

        // Convert the release year to a date
        $validatedData['release_date'] = Carbon::createFromDate($validatedData['release_year'], 1, 1)->toDateString();
        unset($validatedData['release_year']);

        $champion = Champion::create($validatedData);

        $champion->positions()->attach($request->positions);
        $champion->regions()->attach($request->regions);

        return redirect()->route('champions.index')->with('success', 'Champion created successfully!');
    }

    /**
     * Display the specified champion.
     */
    public function show(string $id)
    {
        $champion = Champion::find($id);
        return view('champions.show', compact('champion'));
    }

    /**
     * Show the form for editing the specified champion.
     */
    public function edit(string $id)
    {
        $champion = Champion::find($id);
        return view('champions.edit', compact('champion'));
    }

    /**
     * Update the specified champion in storage.
     */
    public function update(Request $request, string $id)
    {
        $champion = Champion::find($id);
        $champion->update($request->all());
        return redirect()->route('champions.index');
    }

    /**
     * Remove the specified champion from storage.
     */
    public function destroy(string $id)
    {
        Champion::find($id)->delete();
        return redirect()->route('champions.index');
    }
}
