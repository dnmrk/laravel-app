<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome', [
//         'tasks' => [
//             'Go to the store',
//             'Go to the bank',
//             'Go to the post office',
//         ],
//     ]);
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', function () {
    $ideas = session()->get('ideas', []);
    return view('ideas', [
        'ideas' => $ideas,
    ]);
});

Route::post('/ideas', function () {
    $idea = request('idea');
    // $idea = Request::input('idea');
    session()->push('ideas', $idea);

    return redirect('/');
});

Route::get('/delete-ideas', function () {
    session()->forget('ideas');

    return redirect('/');
});
