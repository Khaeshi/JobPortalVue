<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserAvatarController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user/avatar', [UserAvatarController::class, 'update']);
    Route::post('/api/user/avatar', [UserAvatarController::class, 'update']);
});

Route::get('/user/{id}/avatar', [UserAvatarController::class, 'show']);

Route::get('/api/user/{id}/avatar', [UserAvatarController::class, 'show']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
