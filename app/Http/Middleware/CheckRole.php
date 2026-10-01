<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request based on user roles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // If no specific roles defined, allow through
        if (empty($roles)) {
            return $next($request);
        }

        // 1. Authenticated User Flow
        if ($user) {
            // Check if user's role matches any of the required roles
            if (in_array($user->role, $roles, true) || in_array('*', $roles, true)) {
                return $next($request);
            }

            // User logged in but unauthorized for this role
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Akses ditolak: Anda tidak memiliki wewenang Administrator untuk mengakses halaman ini.'
                ], 403);
            }

            return redirect()->route('login')->with('error', 'Akses Ditolak: Halaman Admin hanya dapat diakses oleh akun Administrator PMB.');
        }

        // 2. Guest (Unauthenticated) User Flow
        // Routes permitting 'maba', 'guest', or 'public' permit guest access
        if (in_array('guest', $roles, true) || in_array('maba', $roles, true) || in_array('public', $roles, true)) {
            return $next($request);
        }

        // Guest attempting to access restricted route (e.g., admin)
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        return redirect()->route('login')->with('error', 'Silakan login dengan akun Administrator untuk mengakses halaman ini.');
    }
}
