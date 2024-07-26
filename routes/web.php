<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/about-me', function() {
    return Inertia::render("About");
});

Route::get('/contact-me', function() {
    return Inertia::render("Contact");
});

Route::get('/portfolio', [ProjectController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{project}', [ProjectController::class, 'show'])->name('portfolio.show');

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');

Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('portfolio')->group(function () {
        Route::post('/store', [ProjectController::class, 'store'])->name('portfolio.store');
        Route::post('/{project}/destroy', [ProjectController::class, 'destroy'])->name('portfolio.destroy');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('portfolio.edit');
        Route::post('/{project}/update', [ProjectController::class, 'update'])->name('portfolio.update');
    });

    Route::prefix('services')->group(function () {
        Route::post('/store', [ServiceController::class, 'store'])->name('services.store');
        Route::post('/{service}/destroy', [ServiceController::class, 'destroy'])->name('services.destroy');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::post('/{service}/update', [ServiceController::class, 'update'])->name('services.update');
    });

    Route::prefix('blog')->group(function () {
        Route::post('/store', [PostController::class, 'store'])->name('blog.store');
        Route::post('/{post}/destroy', [PostController::class, 'destroy'])->name('blog.destroy');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('blog.edit');
        Route::post('/{post}/update', [PostController::class, 'update'])->name('blog.update');
    });

    Route::prefix('experiences')->group(function () {
        Route::post('/store', [ExperienceController::class, 'store'])->name('experiences.store');
        Route::post('/{experience}/destroy', [ExperienceController::class, 'destroy'])->name('experiences.destroy');
        Route::get('/{experience}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit');
        Route::post('/{experience}/update', [ExperienceController::class, 'update'])->name('experiences.update');
    });
});

require __DIR__.'/auth.php';
