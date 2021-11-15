<?php

use App\Http\Livewire\Components\ContactModal;

use function Pest\Livewire\livewire;


it('checks the component can render', function () {
    livewire(ContactModal::class)
        ->assertSee('Entre em Contato');
});

it('checks the component validate function', function () {
    livewire(ContactModal::class)
         ->set('name', 'abc')
         ->set('email', 'joao')
         ->set('phone', '')
         ->set('message', '')
         ->call('submit')
         ->assertHasErrors(['name', 'email', 'phone', 'message']);
 });

it('checks the component submit function', function () {
    livewire(ContactModal::class)
        ->set('name', 'Joaquim Silva Silva')
        ->set('email', 'joaquim@gmail.com')
        ->set('phone', '40068922')
        ->set('message', 'Salve')
        ->call('submit')
        ->assertHasNoErrors(['name', 'email', 'phone', 'message']);

        // TODO:: Adicionar depois
        // $this->assertDatabaseHas('contacts', [
        //     'name' => 'Joaquim Silva Silva',
        //     'email' => 'joaquim@gmail.com'
        // ]);
});