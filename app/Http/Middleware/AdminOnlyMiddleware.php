<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnlyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 0) {
            return $next($request);
        }

        return redirect('error')->with('error', 'Access denied. Only admins are allowed.');
    }
}
