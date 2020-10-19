<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAdminTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * @test
     */
    public function guest_cannot_see_the_pastes_index()
    {
        $response = $this->get(route('users.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function logged_in_user_can_see_the_pastes_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('users.index'));

        $response
            ->assertOk()
            ->assertSee('Users')
            ->assertSee('User Id')
            ->assertSee('Name')
            ->assertSee('Email')
            ->assertSee('Verified')
            ->assertSee('Created');
    }
}
