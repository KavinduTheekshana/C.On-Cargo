<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserOnlyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 2) {
            return $next($request);
        }

        return redirect('error')->with('error', 'Access denied. Only Registerd Users are allowed.');
    }
}
