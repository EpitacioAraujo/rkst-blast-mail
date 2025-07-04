<?php

use App\Http\Controllers\EmailListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/email-lists', [EmailListController::class, 'index'])->name('email_lists.index');
    Route::get('/email-lists/create', [EmailListController::class, 'create'])->name('email_lists.create');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
