<?php

use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\CompleteResturentInfo;
use App\Http\Middleware\SellerAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'adminAuth' => AdminAuth::class,
            'sellerAuth' => SellerAuth::class,
            'completeResturentInfo' => CompleteResturentInfo::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
