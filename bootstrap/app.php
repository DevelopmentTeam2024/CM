<?php

use App\Http\Middleware\checkHost;
use App\Http\Middleware\checkUserErrors;
use App\Http\Middleware\Jeddah;
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
        $middleware->append(checkHost::class);
        $middleware->append(checkUserErrors::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();