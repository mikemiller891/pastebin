<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PasteAdminTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * @test
     */
    public function guest_cannot_see_the_pastes_index(): void
    {
        $response = $this->get(route('pastes.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function user_cannot_see_the_pastes_index(): void
    {
        $user = User::factory()->create([
            'is_admin' => FALSE,
        ]);

        $response = $this->actingAs($user)->get(route('pastes.index'));

        $response->assertNotFound();
    }

    /**
     * @test
     */
    public function admin_user_can_see_the_pastes_index(): void
    {
        $user = User::factory()->create([
            'is_admin' => TRUE,
        ]);

        $response = $this->actingAs($user)->get(route('pastes.index'));

        $response
            ->assertOk()
            ->assertSee('Pastes')
            ->assertSee('Key')
            ->assertSee('Content')
            ->assertSee('Created');
    }
}
