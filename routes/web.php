<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PosterController;
use Illuminate\Support\Facades\Route;


Route::get('/',[WebController::class,'index'])->name( 'home');
Route::get('/projects',[WebController::class,'projects'])->name( 'projects');
Route::get('/news',[WebController::class,'news'])->name( 'news');
Route::get('/news/{slug}',[WebController::class,'newsReadMore'])->name( 'news.readmore');
Route::post('/contact',[WebController::class,'contactPost'])->name( 'contact.submit');
Route::get('/courses',[WebController::class,'courses'])->name( 'courses');

// Default login route for Laravel auth middleware
Route::get('/login', function() {
    return redirect()->route('admin.login');
})->name('login');

// Authentication routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name( 'index');
    Route::resource('news', NewsController::class);
    Route::resource('contacts', ContactController::class)->except(['create', 'store', 'update', 'edit']);
    Route::get('contacts/{contact}/reply', [ContactController::class, 'reply'])->name('contacts.reply');
    Route::post('contacts/{contact}/reply', [ContactController::class, 'sendReply'])->name('contacts.send-reply');
    Route::resource('posters', PosterController::class)->except(['show']);
});
