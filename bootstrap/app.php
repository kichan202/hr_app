<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //Add the custom RoleMiddleware

        $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);

        // Add any other global middleware here if needed
        // $middleware->add('throttle', \Illuminate\Routing\Middleware\ThrottleRequests::class);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
         // Customize exception handling if needed
        // $exceptions->register(function (\Throwable $e) {
        //     //
        // });
    })->create();
