<?php

namespace Tests\Feature;

use App\Models\Paste;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PastebinTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_can_see_the_paste_editor(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('paste.edit')
            ->assertSee('<title>Pastebin', false)
            ->assertSee('</form>', false)
            ->assertSee('</textarea>', false)
            ->assertSee('</button>', false);
    }

    /**
     * @test
     */
    public function user_can_save_a_paste(): void
    {
        $content = $this->faker->paragraph;
        $post_data = [
            'content' => $content,
            'cmd'     => 'save',
        ];
        $response = $this->post('/', $post_data);

        $paste = Paste::withContent($content)->firstOrFail();
        $key = $paste->key;
        $url = "/{$key}";

        $response->assertRedirect($url);
    }

    /**
     * @test
     */
    public function user_can_cancel_the_paste_editor(): void
    {
        $content = $this->faker->paragraph;
        $post_data = [
            'content' => $content,
            'cmd'     => 'cancel',
        ];
        $response = $this->post('/', $post_data);

        $url = '/';

        $response->assertRedirect($url);
    }

    /**
     * @test
     */
    public function user_cannot_save_a_blank_paste(): void
    {
        $post_data = [
            'content' => ' ',
            'cmd'     => 'save',
        ];
        $response = $this->post('/', $post_data);

        $url = '/';

        $response->assertRedirect($url);
    }

    /**
     * @test
     */
    public function user_can_view_a_paste(): void
    {
        $paste = Paste::factory()->create();
        $key = $paste->key;
        $url = "/{$key}";
        $response = $this->get($url);

        $content = $paste->content;
        $response
            ->assertOk()
            ->assertSee($content);
    }

    /**
     * @test
     */
    public function user_cannot_view_a_nonexistent_paste(): void
    {
        $key = Paste::generateUniqueKey();
        $url = "/{$key}";
        $response = $this->get($url);

        $response->assertNotFound();
    }

    /**
     * @test
     */
    public function user_can_fork_a_paste(): void
    {
        $paste = Paste::factory()->create();
        $key = $paste->key;
        $post_data = [
            'cmd' => 'fork',
        ];
        $url = "/{$key}";
        $response = $this->post($url, $post_data);

        $url = '/';
        $response
            ->assertRedirect($url)
            ->assertSessionHas('key', $key);
    }

    /**
     * @test
     */
    public function user_can_start_a_new_paste_when_viewing_a_paste(): void
    {
        $paste = Paste::factory()->create();
        $key = $paste->key;
        $post_data = [
            'cmd' => 'new',
        ];
        $url = "/{$key}";
        $response = $this->post($url, $post_data);

        $url = '/';
        $response
            ->assertRedirect($url)
            ->assertSessionMissing('key');
    }

    /**
     * @test
     */
    public function user_can_see_a_forked_paste_in_the_paste_editor(): void
    {
        $paste = Paste::factory()->create();
        $key = $paste->key;
        $url = '/';
        $session_data = [
            'key' => $key,
        ];
        $response = $this->withSession($session_data)->get($url);

        $content = $paste->content;
        $response
            ->assertOk()
            ->assertSee($content);
    }

    /**
     * @test
     */
    public function user_cannot_see_a_non_forked_paste_in_the_paste_editor(): void
    {
        $key = Paste::generateUniqueKey();
        $url = '/';
        $session_data = [
            'key' => $key,
        ];
        $response = $this->withSession($session_data)->get($url);

        $response->assertNotFound();
    }
}
