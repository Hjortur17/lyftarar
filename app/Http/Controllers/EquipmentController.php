<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
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

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return Redirect::route('equipments.index');
    }
}
