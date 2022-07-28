<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class isAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->getAuthIdentifier() == $request->user_id ) {
            return $next($request);
        }
        return redirect()->route('home', ['user_id' => Auth::user()->getAuthIdentifier()]);
    }
}
