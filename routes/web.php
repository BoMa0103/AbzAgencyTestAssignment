<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
    $localePrefix = config('app.locale_prefix');
    return Route::post("/{$localePrefix}/livewire/update", $handle);
});

Route::get('/', function () {
    return redirect('/users');
});

Route::get('/users', function () {
    return view('users');
})->name('users.index');

Route::get('/create-user', function () {
    return view('create-user');
})->name('users.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
