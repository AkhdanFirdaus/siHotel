<?php

namespace App\Http\Middleware;

use Closure;

class hotelSide
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
        if (!$request->user()->authorizeRoles(['Admin', 'Manajer'])) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
