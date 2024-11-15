<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PP\PassportDataEntryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/apps/hr/passport/dashboard', [PassportDataEntryController::class, 'index'])->name('apps.hr.passport.dashboard');
    Route::get('/apps/hr/passport/data-entry', [PassportDataEntryController::class, 'index'])->name('apps.hr.passport.data-entry');
    Route::get('/apps/hr/passport/data-entry/{id}/edit', [PassportDataEntryController::class, 'edit'])->name('apps.hr.passport.data-entry.edit');
});

require __DIR__.'/auth.php';


Route::resource('passports', App\Http\Controllers\PassportController::class);


Route::resource('passport-data-entries', App\Http\Controllers\PassportDataEntryController::class);
