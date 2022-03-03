<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;

Route::get('/url-shortener', [UrlShortenerController::class, 'index'])->name('index');
Route::post('/url-shortener', [UrlShortenerController::class, 'urlShorten'])->name('url.shorten');
Route::get('/{code}', [UrlShortenerController::class, 'urlRedirect'])->name('url.redirect');
