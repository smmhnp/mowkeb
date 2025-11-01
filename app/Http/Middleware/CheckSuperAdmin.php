<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('UserController.loginPage')->withErrors([
                'message' => 'برای دسترسی باید ابتدا وارد شوید.'
            ]);
        }

        if ($user->role != 'super_admin') {
            return response()->view('errors.error403', [], 403);
        }

        return $next($request);
    }
}
