<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOrAgentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 0 || auth()->user()->role == 1) {
            return $next($request);
        }

        return redirect('error')->with('error', 'Access denied. Only Admins are allowed.');
    }
}
