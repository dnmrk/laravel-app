<?php

use App\Models\User;

test('register a user', function () {
    // When I visit the registration page
    // And I should be on the /ideas page.
    // And I fill out and submit the form
    visit('/register')
        ->fill('name', 'Dean Mark')
        ->fill('email', 'dean@example.com')
        ->fill('password', 'passwordLaravel!')
        ->press('@register-button')
        ->assertPathIs('/ideas');

    // Then I should have an account
    expect(User::count())->toBe(1);
    expect(User::where('email', 'dean@example.com')->exists())->toBe(true);

    // And I should be signed in.
    $this->assertAuthenticated();


});
