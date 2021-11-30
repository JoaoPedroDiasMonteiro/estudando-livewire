<?php

use Faker\Factory;
use function Pest\Livewire\livewire;
use App\Notifications\ContactNotification;

use Illuminate\Support\Facades\Notification;
use App\Http\Livewire\Components\ContactModal;
use App\Models\Contact;

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
    $factory = Factory::create();
    $contact['name'] = $factory->name();
    $contact['email'] = $factory->email();
    $contact['phone'] = $factory->phoneNumber();
    $contact['message'] = $factory->text();

    livewire(ContactModal::class)
        ->set('name', $contact['name'])
        ->set('email', $contact['email'])
        ->set('phone', $contact['phone'])
        ->set('message', $contact['message'])
        ->call('submit')
        ->assertHasNoErrors(['name', 'email', 'phone', 'message']);

    $this->assertDatabaseHas('contacts', [
        'name' => $contact['name'],
        'email' => $contact['email'],
        'phone' => $contact['phone'],
        'message' => $contact['message'],
    ]);
});

it('checks the component notification', function () {
    Notification::fake();

    $factory = Factory::create();
    $contact['name'] = $factory->name();
    $contact['email'] = $factory->email();
    $contact['phone'] = $factory->phoneNumber();
    $contact['message'] = $factory->text();

    livewire(ContactModal::class)
        ->set('name', $contact['name'])
        ->set('email', $contact['email'])
        ->set('phone', $contact['phone'])
        ->set('message', $contact['message'])
        ->call('submit')
        ->assertHasNoErrors(['name', 'email', 'phone', 'message']);

    Notification::assertSentTo(Contact::first(), ContactNotification::class);
});
