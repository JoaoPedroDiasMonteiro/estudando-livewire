<?php

use App\Http\Livewire\Components\CreateAccountModal;

use function Pest\Livewire\livewire;


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
    $response = livewire(CreateAccountModal::class)
        ->set('name', 'Joaquim Silva Silva')
        ->set('email', 'joaquim@gmail.com')
        ->set('password', '40068927772')
        ->set('password_confirmation', '40068927772')
        ->call('submit')
        ->assertHasNoErrors(['name', 'email', 'password']);

    $this->assertDatabaseHas('users', [
        'name' => 'Joaquim Silva Silva',
        'email' => 'joaquim@gmail.com'
    ]);

    $response->assertRedirect(route('dashboard'));
});
