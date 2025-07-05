<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserAvatarController;
use Illuminate\Http\Request;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Job Portal Routes
Route::get('/jobs', function () {
    return Inertia::render('Jobs/Index');
})->name('jobportal');

Route::get('/jobs/create', function () {
    return Inertia::render('Jobs/Create');
})->name('jobs.create');

Route::get('/companies', function () {
    return Inertia::render('Companies/Index');
})->name('companies');

Route::get('/applications', function () {
    return Inertia::render('Applications/Index');
})->name('applications');

// Footer and other pages
Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/help', function () {
    return Inertia::render('Help');
})->name('help');

Route::get('/privacy', function () {
    return Inertia::render('Privacy');
})->name('privacy');

Route::get('/terms', function () {
    return Inertia::render('Terms');
})->name('terms');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user/avatar', [UserAvatarController::class, 'update']);
    Route::post('/api/user/avatar', [UserAvatarController::class, 'update']);
});

Route::get('/user/{id}/avatar', [UserAvatarController::class, 'show']);

Route::get('/api/user/{id}/avatar', [UserAvatarController::class, 'show']);

Route::middleware(['auth:sanctum'])->get('/api/dashboard-stats', function (Request $request) {
    $user = $request->user();

    // Example: Replace these with real queries
    return [
        'active_jobs' => \App\Models\Job::where('status', 'active')->count(), //still to evaluate when jobs page is done
        'applications' => $user->applications()->count(),
        'interviews' => $user->interviews()->count(),
        'saved_jobs' => $user->savedJobs()->count(),
    ];
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
