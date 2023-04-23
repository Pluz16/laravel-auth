<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{slug}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{slug}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{slug}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
});

require __DIR__.'/auth.php';

