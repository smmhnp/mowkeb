<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckSuperAdmin;
use App\Http\Middleware\CheckWirter;
use App\Http\Middleware\RestrictByIP;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'RestrictByIP' => RestrictByIP::class,
            'CheckAdmin' => CheckAdmin::class,
            'CheckSuperAdmin' => CheckSuperAdmin::class,
            'CheckWriter' => CheckWirter::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
