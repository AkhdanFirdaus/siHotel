<?php

namespace App\Http\Middleware;

use Closure;

class ResepsionisOnly
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
        if (!$request->user()->authorizeRoles(['Admin', 'Resepsionis'])) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
