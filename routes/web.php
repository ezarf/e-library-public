<?php

use App\Http\Controllers\HallController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage', ['title' => 'Homepage']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/hall', [HallController::class, 'index']);
Route::get('/hall/{book:slug}', [HallController::class, 'detailBook']);
Route::get('/hall/author/{author:slug}', [HallController::class, 'bookByAuthor']);
Route::get('/hall/category/{category:slug}', [HallController::class, 'bookByCategory']);