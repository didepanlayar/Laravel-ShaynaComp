<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CompanyAboutController;
use App\Http\Controllers\CompanyStatisticController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/products', [FrontController::class, 'products'])->name('front.products');
Route::get('/teams', [FrontController::class, 'teams'])->name('front.teams');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('front.appointment');
Route::post('/appointment/store', [FrontController::class, 'storeAppointment'])->name('front.appointment.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        // Manage Statistics
        Route::middleware('can: Manage Statistics')->group(function () {
            Route::resource('statistics', CompanyStatisticController::class);
        });

        // Manage Products
        Route::middleware('can: Manage Products')->group(function () {
            Route::resource('products', ProductController::class);
        });

        // Manage Principles
        Route::middleware('can: Manage Principles')->group(function () {
            Route::resource('principles', OurPrincipleController::class);
        });

        // Manage Testimonials
        Route::middleware('can: Manage Testimonials')->group(function () {
            Route::resource('testimonials', TestimonialController::class);
        });

        // Manage Clients
        Route::middleware('can: Manage Clients')->group(function () {
            Route::resource('clients', ProjectClientController::class);
        });

        // Manage Teams
        Route::middleware('can: Manage Teams')->group(function () {
            Route::resource('teams', OurTeamController::class);
        });

        // Manage Abouts
        Route::middleware('can: Manage Abouts')->group(function () {
            Route::resource('abouts', CompanyAboutController::class);
        });

        // Manage Appointment
        Route::middleware('can: Manage Appointment')->group(function () {
            Route::resource('appointments', AppointmentController::class);
        });

        // Manage Hero Sections
        Route::middleware('can: Manage Hero Sections')->group(function () {
            Route::resource('hero-sections', HeroSectionController::class);
        });
    });
});

require __DIR__.'/auth.php';
