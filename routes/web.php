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

// index
Route::get('/ideas', function () {
    // $ideas = session()->get('ideas', []);
    // $ideas = DB::table('ideas')->get();
    // $ideas = Idea::where('state', 'pending')->get();
    // $idea = Idea::find(1);

    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();

    return view('ideas.index', [
        'ideas' => $ideas,
    ]);
});

// show
Route::get('/ideas/{idea}', function (Idea $idea) {
    return view('ideas.show', [
        'idea' => $idea,
    ]);
});

// edit
Route::get('/ideas/{idea}/edit', function (Idea $idea) {
    return view('ideas.edit', [
        'idea' => $idea,
    ]);
});

Route::patch('/ideas/{idea}', function (Idea $idea) {
    $idea->update([
        'description' => request('description')
    ]);
    return redirect("/ideas/{$idea->id}");
});

// store
Route::post('/ideas', function () {
    $idea = Idea::create([
        'description' => request('description'),
        'state' => 'pending',
    ]);

    // $idea = Request::input('idea');
    // session()->push('ideas', $idea);

    return redirect('/');
});

// destroy
Route::delete('/ideas/{idea}', function (Idea $idea) {
    $idea->delete();

    return redirect('/ideas');
});
