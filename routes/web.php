<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;

// index
Route::get('/ideas', function () {
    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();

    return view('ideas.index', [
        'ideas' => $ideas,
    ]);
});

// create
Route::get('/ideas/create', function () {
    return view('ideas.create');
});

// store
Route::post('/ideas', function () {
    $idea = Idea::create([
        'description' => request('description'),
        'state' => 'pending',
    ]);

    // $idea = Request::input('idea');
    // session()->push('ideas', $idea);

    return redirect('/ideas');
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

// destroy
Route::delete('/ideas/{idea}', function (Idea $idea) {
    $idea->delete();

    return redirect('/ideas');
});
