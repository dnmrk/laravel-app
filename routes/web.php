<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello',
    'person' => request('person', 'World'),
]);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});