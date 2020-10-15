<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PasteController extends Controller
{
    /**
     * Display a form for editing a paste.
     *
     * @param Request $request
     * @return Application|Factory|View
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
     * @return Application|RedirectResponse|Redirector|void
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
        return abort(404);
    }

    /**
     * Save a submitted  paste to the database.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
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
        return redirect('/' . $paste->key);
    }

    /**
     * Display a paste.
     *
     * @param Paste $paste
     * @return Application|Factory|View
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
     * @return Application|RedirectResponse|Redirector|void
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
        return abort(404);
    }
}
