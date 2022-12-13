<?php

namespace App\Http\Controllers;

use App\Models\ForkliftClass;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'forkliftsClasses' => ForkliftClass::with('forklifts')->get()
        ]);
    }
}
