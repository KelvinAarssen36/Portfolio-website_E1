<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdministrator
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->administrator) {
            return $next($request);
        }

        return redirect('/'); // Of geef een foutmelding weer
    }
}
