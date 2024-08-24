<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ATHLETE ROUTES //
Route::get('/manage-athletes', [App\Http\Controllers\AthleteController::class, 'manageAthletes'])->name('manage-athletes');
Route::get('/add-athlete', [App\Http\Controllers\AthleteController::class, 'addAthlete'])->name('add-athlete');
Route::post('/add-athlete/store', [App\Http\Controllers\AthleteController::class, 'store'])->name('store-athlete');
Route::get('/delete-athlete/{id}', [App\Http\Controllers\AthleteController::class, 'destroy'])->name('delete-athlete');
Route::get('/edit-athlete/{id}', [App\Http\Controllers\AthleteController::class, 'edit'])->name('edit-athlete');
Route::post('/modify-athlete/{id}', [App\Http\Controllers\AthleteController::class, 'modify'])->name('modify-athlete');

// WORKOUT ROUTES //
Route::get('/new-workout', [App\Http\Controllers\WorkoutController::class, 'new'])->name('new-workout');
Route::post('/build-workout', [App\Http\Controllers\WorkoutController::class, 'build'])->name('build-workout');

// GROUP ROUTES //
Route::get('/manage-groups', [App\Http\Controllers\WorkoutController::class, 'manage'])->name('manage-groups');
