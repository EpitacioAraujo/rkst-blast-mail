<?php

use App\Http\Controllers\EmailListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/email-lists', [EmailListController::class, 'index'])->name('email_lists.index');

    Route::get('/email-lists/create', [EmailListController::class, 'create'])->name('email_lists.create');
    Route::post('/email-lists/create', [EmailListController::class, 'store']);

    Route::get('/email-lists/{emailList}', [EmailListController::class, 'show'])->name('email_lists.show');

    Route::get('/email-lists/{emailList}/subscriber/create', [SubscriberController::class, 'create'])->name('email_lists.subscriber.create');
    Route::post('/email-lists/{emailList}/subscriber/create', [SubscriberController::class, 'store']);

    Route::delete('/email-lists/{emailList}/subscriber/{subscriber}', [EmailListController::class, 'deleteSubscriber'])->name('email_lists.deleteSubscriber');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
