<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = trim((string) Auth::user()->type);
        $allowedRoles = array_map('trim', $roles);

        if (empty($allowedRoles) || in_array($userRole, $allowedRoles, true)) {
            return $next($request);
        }

        abort(403, 'You do not have permission to access this page.');
    }
}
