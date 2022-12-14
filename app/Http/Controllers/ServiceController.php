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
            'type' => 'required|max:50'
        ]);

        Service::create([
            'forklift_id' => $request->forklift,
            'priority' => $request->priority,
            'type' => $request->type,
            'description' => $request->description === null ? 'Engin athugasemd' : $request->description,
            'done' => $request->done
        ]);

        return redirect()->back();
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

    public function edit($id)
    {

    }
    public function update(Request $request, Service $service)
    {
        $service->update([
            'done' => $request->done
        ]);

        return back()->with('success', 'Þjónusta hefur verið uppfærð');
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
