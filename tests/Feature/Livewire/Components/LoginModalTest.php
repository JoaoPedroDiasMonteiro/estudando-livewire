<?php

use function Pest\Livewire\livewire;
use App\Http\Livewire\Components\LoginModal;
use App\Models\User;


it('checks the component can render', function () {
    livewire(LoginModal::class)
        ->assertSee('Login');
});

it('checks the component validate email and password', function () {
    livewire(LoginModal::class)
        ->set('email', '')
        ->set('password', '')
        ->call('submit')
        ->assertHasErrors(['email', 'password']);
});

it('checks the component submit function', function () {
    $user = User::factory()->create();

    livewire(LoginModal::class)
        ->set('email', $user['email'])
        ->set('password', 'password')
        ->call('submit')
        ->assertHasNoErrors();

        $this->assertAuthenticatedAs($user);
});

// it('checks the component validate throttle', function () {
//     /** @var TestCase $this */
//     $this->startSession();

//     $livewire = livewire(LoginModal::class)
//         ->set('email', '')
//         ->set('password', '');

//     for ($i=0; $i < 5; $i++) { 
//         $livewire->call('submit');
//     }

//     $livewire->assertHasErrors(['auth']);
// });