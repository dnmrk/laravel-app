<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;

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
    // $ideas = session()->get('ideas', []);

    // $ideas = DB::table('ideas')->get();
    // $ideas = Idea::where('state', 'pending')->get();
    // $idea = Idea::find(1);

    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();

    return view('ideas', [
        'ideas' => $ideas,
    ]);
});

Route::post('/ideas', function () {
    $idea = Idea::create([
        'description' => request('idea'),
        'state' => 'pending',
    ]);

    // $idea = Request::input('idea');
    // session()->push('ideas', $idea);

    return redirect('/');
});

Route::get('/delete-ideas', function () {
    session()->forget('ideas');

    return redirect('/');
});
