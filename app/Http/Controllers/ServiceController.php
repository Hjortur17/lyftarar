<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return Inertia::render('Services', ['services' => $services]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'priority' => 'required',
            'type' => 'required|max:50',
            'description' => 'required|min:5',
        ]);

        Service::create([
            'forklift_id' => $request->forklift,
            'priority' => $request->priority,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return redirect()->back();

//        return Redirect::route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
