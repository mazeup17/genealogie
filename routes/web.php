<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PersonController::class, 'index'])->name('people.index');

// D'abord les routes spécifiques
Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
Route::post('/people', [PersonController::class, 'store'])->name('people.store');

// Ensuite les routes avec paramètres
Route::get('/people/{person}', [PersonController::class, 'show'])->name('people.show');

// Alternativement, vous pourriez utiliser une définition de ressource qui gère cet ordre automatiquement:
// Route::resource('people', PersonController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
