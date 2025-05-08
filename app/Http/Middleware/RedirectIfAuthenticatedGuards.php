<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedGuards
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$guardsToCheck
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guardsToCheck)
    {
        foreach ($guardsToCheck as $guard) {
            if (Auth::guard($guard)->check()) {
                switch ($guard) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'web':
                        return redirect()->route('dashboard');
                    default:
                        return redirect('/');
                }
            }
        }

        return $next($request);
    }
}
