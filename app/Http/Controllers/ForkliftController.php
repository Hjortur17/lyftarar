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
        return Inertia::render('Forklifts', [
            'forkliftsClasses' => ForkliftClass::with('forklifts')->orderBy('title', 'desc')->get()
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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($model)
    {
        return Inertia::render('Show', [
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
