<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário autenticado tem o papel de 'admin'
        if ($request->user() && $request->user()->hasRole('Gerente')) {
            return $next($request);
        }

        // Verifica se o usuário autenticado tem o papel de 'supervisor1'
        if ($request->user() && $request->user()->hasRole('Supervisor1')) {
            return $next($request);
        }

        // Verifica se o usuário autenticado tem o papel de 'supervisor2'
        if ($request->user() && $request->user()->hasRole('Supervisor2')) {
            return $next($request);
        }

        abort(403, 'Access denied');
    }
}
