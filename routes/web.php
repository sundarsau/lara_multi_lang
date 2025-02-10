<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['lang'])->group(function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('languages', LanguageController::class);
    Route::get('lang/{locale}',[HomeController::class, 'setLanguage'])->name('setlocale');
});

