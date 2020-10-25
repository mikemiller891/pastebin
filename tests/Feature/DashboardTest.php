<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * @test
     */
    public function guest_cannot_see_the_dashboard(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function registered_user_cannot_see_dashboard_data(): void
    {
        $user = User::factory()->create([
            'is_admin' => FALSE,
        ]);

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response
            ->assertOk()
            ->assertSee('Dashboard')
            ->assertDontSee('Total users')
            ->assertDontSee('Total pastes');
    }

    /**
     * @test
     */
    public function admin_user_can_see_the_dashboard(): void
    {
        $user = User::factory()->create([
            'is_admin' => TRUE,
        ]);

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response
            ->assertOk()
            ->assertSee('Dashboard')
            ->assertSee('Total users')
            ->assertSee('Total pastes');
    }
}
