<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // lançar exeção quando ouver erro de autenticação, exeção do tipo AuthenticationException
        $exceptions->render(function (AuthenticationException $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token de autenticação inválido ou ausente.',
            ], 401);
        });

    })->create();
