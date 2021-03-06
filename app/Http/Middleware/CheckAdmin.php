<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if (auth()->check())
        {
            if (auth()->user()->role == 0)
            {
                return $next($request);

            }
            return redirect()->route('get.home');
        }
        return redirect()->route('get.home');
    }
}
