<?php

namespace Tests\Feature;

use App\Models\Paste;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PastebinTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function user_can_see_the_paste_editor()
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertDontSee('<script', false)
            ->assertSee('<title>Pastebin</title>', false)
            ->assertSee('<textarea', false)
            ->assertSee('<button', false)
        ;
    }

    /**
     * @test
     */
    public function user_can_save_a_paste()
    {
        $content = $this->faker()->paragraph();
        $payload = [
            'content' => $content,
            'action' => 'save',
        ];
        $response = $this->post('/', $payload);
        $paste = Paste::withContent($content)->firstOrFail();

        $response->assertRedirect('/'.$paste->key);
    }

    /**
     * @test
     */
    public function user_cannot_save_a_blank_paste()
    {
        $payload = [
            'content' => ' ',
            'action' => 'save',
        ];
        $response = $this->post('/', $payload);
        $count = Paste::withContent(' ')->count();

        $this->assertEquals(0, $count);
        $response->assertRedirect('/');
    }

    /**
     * @test
     */
    public function user_can_cancel_a_paste()
    {
        $content = $this->faker()->paragraph();
        $payload = [
            'content' => $content,
            'action' => 'cancel',
        ];
        $response = $this->post('/', $payload);
        $count = Paste::withContent($content)->count();

        $this->assertEquals(0, $count);
        $response->assertRedirect('/');
    }

    /**
     * @test
     */
    public function user_can_see_a_saved_paste()
    {
        $paste = Paste::factory()->create();
        $response = $this->get('/'.$paste->key);

        $response
            ->assertOk()
            ->assertSee($paste->content)
        ;
    }

    /**
     * @test
     */
    public function user_can_fork_a_paste()
    {
        $payload = [
            'action' => 'fork'
        ];
        $paste = Paste::factory()->create();
        $response = $this->post('/'.$paste->key, $payload);

        $response
            ->assertRedirect('/')
            ->assertSessionHas('key', $paste->key)
        ;

        $response = $this->withSession(['key'=>$paste->key])->get('/');

        $response
            ->assertOk()
            ->assertSee($paste->content)
        ;
    }

    /**
     * @test
     */
    public function user_can_start_a_new_paste()
    {
        $payload = [
            'action' => 'new'
        ];
        $paste = Paste::factory()->create();
        $response = $this->post('/'.$paste->key, $payload);

        $response
            ->assertRedirect('/')
            ->assertSessionMissing('key')
        ;
    }

    /**
     * @test
     */
    public function hackers_get_404()
    {
        $bad_key = Paste::generateUniqueKey();
        $good_paste = Paste::factory()->create();

        $payload = [ 'action' => '1337' ];
        $response = $this->post('/', $payload);
        $response->assertNotFound();

        $response = $this->get('/'.$bad_key);
        $response->assertNotFound();

        $response = $this->post('/'.$bad_key);
        $response->assertNotFound();

        $payload = [ 'action' => '1337' ];
        $response = $this->post('/'.$good_paste->key, $payload);
        $response->assertNotFound();

    }
}

