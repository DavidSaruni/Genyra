<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;



Route::get('/',[WebController::class,'index'])->name( 'home');
Route::get('/projects',[WebController::class,'projects'])->name( 'projects');
Route::post('/contact',[WebController::class,'contactPost'])->name( 'contact.submit');