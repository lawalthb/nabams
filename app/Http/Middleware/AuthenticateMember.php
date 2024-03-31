<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Redirect or abort if the user is not authenticated
            return redirect()->route('login');
            // Alternatively, you can return a 401 Unauthorized response
            // return response()->json(['error' => 'Unauthenticated'], 401);
        }

        return $next($request);
    }
}
