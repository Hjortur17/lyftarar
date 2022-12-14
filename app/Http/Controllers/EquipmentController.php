<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Forklift;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();

        return Inertia::render('Equipments/Index', ['equipments' => $equipments]);
    }

    public function create()
    {
        return Inertia::render('Equipments/Create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'serial' => 'required',
        ]);

        Equipment::create($validation);

        return Redirect::route('equipments.index');
    }

    // Used to connect equipment to forklift
    public function edit(Request $request)
    {
        $equipment = Equipment::find($request->equipment);
        Forklift::find($request->forklift)->equipments()->save($equipment);

        return back()->with('success', "$equipment->title hefur verið bætt við");
    }

    public function remove(Request $request)
    {
        Forklift::find($request->forklift)->equipments()->detach($request->equipment);

        return back()->with('success', "$request->equipment->title er ekki lengur tengt þessum lyftara");
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return Redirect::route('equipments.index');
    }
}
