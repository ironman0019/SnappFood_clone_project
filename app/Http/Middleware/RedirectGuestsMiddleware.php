<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectGuestsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in as admin
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }

        // Check if the user is logged in as seller
        if (Auth::guard('seller')->check()) {
            return redirect('/seller/dashbord');
        }

        // If both checks pass, continue with the next middleware or the request
        return $next($request);
    }
}
