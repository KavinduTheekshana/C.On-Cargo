<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOrAgentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // Check if there is an authenticated user and if they have the required role
        if ($user && ($user->role == 0 || $user->role == 1)) {
            return $next($request);
        }

        return redirect('error')->with('error', 'Access denied. Only Admins are allowed.');
    }
}
