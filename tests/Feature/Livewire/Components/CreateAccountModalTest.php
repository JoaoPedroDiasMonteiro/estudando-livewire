<?php

use Faker\Factory;
use App\Models\User;
use App\Events\UserRegistered;
use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Event;
use App\Http\Livewire\Components\CreateAccountModal;
use App\Listeners\SendUserRegisteredNotification;
use App\Listeners\SendWelcomeNotification;
use App\Mail\UserRegisteredNotification;
use App\Mail\UserWelcome;

it('checks the component can render', function () {
    livewire(CreateAccountModal::class)
        ->assertSee('Criar uma Conta');
});

it('checks the component validate function', function () {
    livewire(CreateAccountModal::class)
        ->set('name', 'abc')
        ->set('email', 'joao')
        ->set('password', '')
        ->set('password_confirmation', '')
        ->call('submit')
        ->assertHasErrors(['name', 'email', 'password']);
});

it('checks the component submit function', function () {
    Event::fake();

    $user = User::factory()->raw();

    $response = livewire(CreateAccountModal::class)
        ->set('name', $user['name'])
        ->set('email', $user['email'])
        ->set('password', $user['password'])
        ->set('password_confirmation', $user['password'])
        ->call('submit')
        ->assertHasNoErrors(['name', 'email', 'password']);

    $this->assertDatabaseHas('users', [
        'name' => $user['name'],
        'email' => $user['email']
    ]);

    Event::assertDispatched(UserRegistered::class);

    Event::assertListening(
        UserRegistered::class,
        SendWelcomeNotification::class
    );

    Event::assertListening(
        UserRegistered::class,
        SendUserRegisteredNotification::class,
    );

    $response->assertRedirect(route('dashboard'));
});
