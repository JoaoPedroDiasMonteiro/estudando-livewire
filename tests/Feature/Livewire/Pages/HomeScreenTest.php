<?php

use App\Http\Livewire\Pages\Home\HomeScreen;

use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

it('checks the component can render', function () {
    livewire(HomeScreen::class)
        ->assertStatus(200);
});

it('checks the contact-modal component can render', function () {
    livewire(HomeScreen::class)->assertSeeLivewire('components.contact-modal');
});

it('checks the create-account-modal component can render', function () {
    livewire(HomeScreen::class)->assertSeeLivewire('components.create-account-modal');
});