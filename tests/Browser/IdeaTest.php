<?php

use App\Models\User;

it('shows all ideas', function () {
    $this->actingAs($user = User::factory()->create());

    $user->ideas()->create([
        'description' => 'Build a thing'
    ]);

    visit('/ideas')
        ->assertSee('Build a thing');
});

it('shows a single idea', function () {
    $this->actingAs($user = User::factory()->create());

    $user->ideas()->create([
        'description' => 'Build a thing'
    ]);

    visit('/ideas')
        ->click('Build a thing')
        ->click('Update')
        ->assertSee('Edit');
});

it('shows an edit form to update an idea', function () {
    $this->actingAs($user = User::factory()->create());

    $user->ideas()->create([
        'description' => 'Build a thing'
    ]);

    visit('/ideas')
        ->click('Build a thing')
        ->assertSee('Edit Your Idea');
});