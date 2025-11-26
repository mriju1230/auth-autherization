<?php

use App\Http\Middleware\isAccountentMiddleware;
use App\Http\Middleware\IsStaffMiddleware;
use App\Http\Middleware\IsUserAlreadyLogin;
use App\Http\Middleware\IsUserNotLogin;
use App\Http\Middleware\staffLoggedInMiddleware;
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
        $middleware ->alias([
            "is-login" => IsUserAlreadyLogin::class,
            "not-login" => IsUserNotLogin::class,
            "staff-middleware" =>staffLoggedInMiddleware::class,
            "isAccount" =>isAccountentMiddleware::class,
            "isStaff" =>IsStaffMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
