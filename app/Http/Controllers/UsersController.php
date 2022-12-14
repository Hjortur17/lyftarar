<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role')->get();

        return Inertia::render('Users', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users');
    }
}
