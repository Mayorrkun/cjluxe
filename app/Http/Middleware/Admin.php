<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {// Check if user is authenticated first
        if (!Auth::check()) {
            dd('Not Logged In');
        }

        // Check if user is admin
        if (Auth::user()->user_type === 'admin') {
            return $next($request);
        }

        // If not admin, show unauthorized error
        abort(403, 'Unauthorized access.');

    }
}
