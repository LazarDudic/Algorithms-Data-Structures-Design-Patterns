<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('topics', \App\Http\Controllers\TopicController::class);
Route::resource('addresses', \App\Http\Controllers\AddressController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
