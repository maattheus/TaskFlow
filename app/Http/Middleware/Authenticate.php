<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param mixed ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards) 
    {
        // Se a requisição não estiver autenticada e for uma API
        if (!$request->expectsJson() && !$request->user()) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        return parent::handle($request, $next, ...$guards); 
    }
}
