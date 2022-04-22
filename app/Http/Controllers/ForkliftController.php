<?php

namespace App\Http\Controllers;

use App\Models\Forklift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ForkliftController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'forklifts' => Forklift::orderBy('model', 'desc')->get()
        ]);
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
     * @param  \App\Models\Forklift  $forklift
     * @return \Illuminate\Http\Response
     */
    public function show(Forklift $forklift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forklift  $forklift
     * @return \Illuminate\Http\Response
     */
    public function edit(Forklift $forklift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forklift  $forklift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forklift $forklift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forklift  $forklift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forklift $forklift)
    {
        //
    }
}
