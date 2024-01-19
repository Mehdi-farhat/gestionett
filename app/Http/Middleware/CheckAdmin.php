<?php

namespace App\Http\Middleware;
use App\Models\User;


// app/Http/Middleware/CheckAdmin.php

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
?>