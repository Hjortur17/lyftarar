<?php

namespace App\Http\Controllers;

use App\Models\Forklift;
use App\Models\ForkliftClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ForkliftController extends Controller
{
    public function index()
    {
        return Inertia::render('Forklifts/Index', [
            'forkliftsClasses' => ForkliftClass::with('forklifts')->get()
        ]);
    }

    public function search(Request $request)
    {
        $forklift = Forklift::where('model', $request->model)->first();

        if ($forklift !== null) {
            return Redirect::route('forklifts.show', $forklift->model);
        }

        return back()->withErrors([
            'search' => 'Enginn lyftari með þetta JL númer'
        ]);
    }

    public function create()
    {
        return Inertia::render('Forklifts/Create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'type' => 'required',
            'model' => 'required',
            'serial' => 'required',
            'fuel' => 'required',
        ]);

        $forkliftClass = ForkliftClass::where('title', 'LIKE','%'.$request->fuel.'%')->first();

        if (!str_contains($request->model, 'JL-')) {
            $request->model = 'JL-' . $request->model;
        }

        Forklift::create([
            'type' => $request->type,
            'year' => $request->year,
            'model' => $request->model,
            'serial' => $request->serial,
            'fuel' => $request->fuel,
            'next_inspection' => $request->next_inspection,
            'owner' => $request->owner,
            'location' => $request->location,
            'extra_number' => $request->extra_number,
            'bill' => $request->bill,
            'forklift_class_id' => $forkliftClass->id
        ]);

        return Redirect::route('forklifts');
    }

    public function show($model)
    {
        return Inertia::render('Forklifts/Show', [
            'forklift' => Forklift::where('model', $model)->with(['services', 'equipments'])->firstOrFail()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Forklift $forklift
     * @return \Illuminate\Http\Response
     */
    public function edit(Forklift $forklift)
    {
        //
    }

    public function update(Request $request, Forklift $forklift)
    {
        $forklift->update($request->except(['services', 'forklift_class_id', 'equipments']));

        return back()->with(['success' => 'Lyftari (' . $forklift->model . ') hefur verið uppfærður']);
    }

    public function destroy(Forklift $forklift)
    {
        $forklift->delete();

        return redirect()->route('forklifts')->with('message', 'Post Delete Successfully');
    }
}
