<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictByIP
{
    protected $allowedIps = [
        '192.168.1.7',
        '172.23.0.1'
    ];

    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array($request->ip(), $this->allowedIps)) {
            return response()->view('errors.error403', [], 403);
        }

        return $next($request);
    }
}
