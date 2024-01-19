<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStudent
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
        if (Auth::check() && Auth::user()->isStudent()) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}