<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserAvatarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JobController;

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
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.Index');

Route::get('/jobs/create', function () {
    return Inertia::render('jobs/Create');
})->name('jobs.create');

Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('jobs.destroy');

//companies
Route::get('/companies', function () {
    return Inertia::render('companies/Index');
})->name('companies');


//application
Route::get('/applications', function () {
    return Inertia::render('applications/Index');
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

    return [
        'active_jobs' => \App\Models\Job::where('status', 'active')->count(),
        //'applications' => $user->applications()->count(),
        //'interviews' => $user->interviews()->count(),
        //'saved_jobs' => $user->savedJobs()->count(),
        'applications' => 0,
        'interviews' => 0,
        'saved_jobs' => 0,
    ];
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
