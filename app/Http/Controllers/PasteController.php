<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;

class PasteController extends Controller
{
    /**
     * Display a form for editing a paste.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request)
    {
        $key = $request->session()->get('key');
        if ($key) {
            $paste = Paste::withKey($key)->firstOrFail();
        } else {
            $paste = [];
        }
        return view('paste.edit', $paste);
    }

    /**
     * Precess submissions from the paste edit form.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editAction(Request $request)
    {
        $action = $request->input('action');
        if ($action === 'save') {
            return $this->save($request);
        }
        if ($action === 'cancel') {
            return redirect('/');
        }
        abort(404);
    }

    /**
     * Save a submitted  paste to the database.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request)
    {
        $content = $request->input('content');
        if (rtrim($content) === '') {
            return redirect('/');
        }
        $paste = [
            'content' => $content,
        ];
        $paste = Paste::factory()->create($paste);
        return redirect('/'.$paste->key);
    }

    /**
     * Display a paste.
     *
     * @param Paste $paste
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Paste $paste)
    {
        return view('paste.view', $paste);
    }

    /**
     * Process submissions from the paste viewer.
     *
     * @param Request $request
     * @param Paste $paste
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showAction(Request $request, Paste $paste)
    {
        $action = $request->input('action');
        if ($action === 'fork') {
            return redirect('/')->with('key', $paste->key);
        }
        if ($action === 'new') {
            return redirect('/');
        }
        abort(404);
    }
}
