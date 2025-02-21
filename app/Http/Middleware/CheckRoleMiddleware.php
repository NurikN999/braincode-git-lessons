<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = [
            'name' => 'Test',
            'role' => 'guest'
        ];

        if ($user['role'] === 'admin' | $user['role'] === 'editor') {
            return $next($request);
        }

        abort(401, 'Unauthorized');
    }
}
