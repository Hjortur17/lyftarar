<?php

namespace App\Http\Middleware;

use Auth;
use Carbon\Carbon;
use Closure;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChangedPassword
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->reset_password) {
            $email = Auth::user()->email;

            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => Hash::make(Str::random(64)),
                'created_at' => Carbon::now()
            ]);

            $tokenData = DB::table('password_resets')->where('email', $email)->orderBy('created_at', 'desc')->first();

            return redirect('/endurstilla-lykilorð/' . $tokenData->token . '?email=' . $email);
        }

        return $next($request);
    }
}
