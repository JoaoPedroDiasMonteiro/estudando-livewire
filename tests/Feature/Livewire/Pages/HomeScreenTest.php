<?php

namespace Tests\Feature\Livewire\Pages;

use App\Http\Livewire\Pages\HomeScreen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HomeScreenTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(HomeScreen::class);

        $component->assertStatus(200);
    }
}
