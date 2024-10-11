<?php

use App\Http\Controllers\AbilityController;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkinController;
use Illuminate\Support\Facades\Route;

// Custom routes
Route::get('champions/classic', [ChampionController::class, 'classic'])->name('champions.classic');
// Resource routes
Route::resource('abilities', AbilityController::class);
Route::resource('champions', ChampionController::class);
Route::resource('regions', RegionController::class);
Route::resource('roles', RoleController::class);
Route::resource('skins', SkinController::class);

Route::get('/', function () {
    return view('welcome');
});
