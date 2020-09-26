<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasteController extends Controller
{
    /**
     * @param Request $request
     *
     * @return View
     */
    public function edit(Request $request): View
    {
        $session = $request->session();
        if ($session->has('key')) {
            $key = $session->get('key');
            $paste = Paste::withKey($key)->firstOrFail();
        } else {
            $paste_data = [
                'content' => '',
            ];
            $paste = Paste::factory()->make($paste_data);
        }

        return view('paste.edit', $paste);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function edit_action(Request $request): RedirectResponse
    {
        $cmd = $request->input('cmd');

        if ($cmd === 'cancel') {
            return redirect('/');
        }

        // $cmd === 'save'
        $content = $request->input('content');
        if (rtrim($content) === '') {
            return redirect('/');
        }

        $paste_data = [
            'content' => $content,
        ];
        $paste = Paste::factory()->create($paste_data);
        $key = $paste->key;

        return redirect("/{$key}");
    }

    /**
     * @param Paste $paste
     *
     * @return View
     */
    public function show(Paste $paste): View
    {
        return view('paste.show', $paste);
    }

    /**
     * @param Request $request
     * @param $key
     *
     * @return RedirectResponse
     */
    public function show_action(Request $request, $key): RedirectResponse
    {
        $cmd = $request->input('cmd');
        if ($cmd === 'new') {
            return redirect('/');
        }

        // $cmd === 'fork'
        $session_data = [
            'key' => $key,
        ];

        return redirect('/')->with($session_data);
    }
}
