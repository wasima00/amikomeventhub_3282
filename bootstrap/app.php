<?php

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
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            '/midtrans/callback', // Mengecualikan route webhook Midtrans dari blokir CSRF
        ]);

    

    // Redirect user yang sudah login ketika mengakses halaman guest (login/register)
    $middleware->redirectUsersTo(fn () => auth()->user()->role === 'admin' ? '/admin/dashboard' : '/');

        // Redirect user yang belum login ketika mengakses halaman yang butuh auth
    $middleware->redirectGuestsTo('/admin/login');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

     withMiddleware(function (Middleware $middleware) {
     $middleware->validateCsrfTokens(except: [
         '/midtrans/callback', // Mengecualikan route webhook Midtrans dari blokir CSRF
     ]);
});