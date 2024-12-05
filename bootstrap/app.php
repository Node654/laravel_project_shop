<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('web', [
            'throttle:global',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // отправляет в sentry необработанные исключения
        \Sentry\Laravel\Integration::handles($exceptions);
    })->create();