<?php

namespace Tests\Feature\Livewire\Components;

use App\Http\Livewire\Components\ContactModal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ContactModalTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ContactModal::class);

        $component->assertStatus(200);
    }
}
