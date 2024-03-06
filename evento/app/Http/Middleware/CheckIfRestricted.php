<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckIfRestricted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->restricted) {
            // Log the user out.
            Auth::logout();

            // Optionally, redirect them with a message.
            return redirect('/login')->with('error', 'Your account is restricted. Please contact support.');
        }

        return $next($request);
    }
}
