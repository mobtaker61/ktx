<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if user has admin role (you can customize this logic)
        // For now, we'll check if user has a specific email or role
        $user = Auth::user();

        // Simple admin check - you can modify this based on your needs
        // Option 1: Check by email
        $adminEmails = ['admin@ktx.tech', 'admin@ktx.com', 'admin@example.com'];

        // Option 2: Check by role (if you have roles table)
        // $isAdmin = $user->hasRole('admin');

        $isAdmin = in_array($user->email, $adminEmails);

        if (!$isAdmin) {
            abort(403, 'Access denied. Admin privileges required.');
        }

        return $next($request);
    }
}
