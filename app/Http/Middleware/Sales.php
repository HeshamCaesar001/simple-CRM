<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Sales
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role->slug !== 'ADM' &&
            Auth::user()->role->slug !== 'TMLD' &&
            Auth::user()->role->slug !== 'SAL' ) {
            return redirect()->route('403');
        }

        return $next($request);
    }
}
