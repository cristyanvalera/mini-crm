<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\{ClientController, ProfileController, ProjectController, UserController};
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/users', UserController::class)
        ->except('show')
        ->middleware('role:' . RoleEnum::Admin->value);

    Route::resource('/clients', ClientController::class)->except('show');
    Route::resource('/projects', ProjectController::class)->except('show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
