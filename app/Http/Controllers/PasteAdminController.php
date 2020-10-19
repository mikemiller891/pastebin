<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;

class PasteAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $pastes = Paste::latest()->get();
        return view('pastes.index', compact('pastes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paste  $paste
     * @return \Illuminate\Http\Response
     */
    public function show(Paste $paste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paste  $paste
     * @return \Illuminate\Http\Response
     */
    public function edit(Paste $paste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paste  $paste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paste $paste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paste  $paste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paste $paste)
    {
        //
    }
}
