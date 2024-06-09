<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        // Detectar si la aplicación está en modo de mantenimiento
        if ($exception instanceof \Illuminate\Foundation\Http\Exceptions\MaintenanceModeException) {
            return response()->view('auth-offline', [], 503);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->view('auth-404-basic', [], 404);
        }

        if ($exception instanceof HttpException && $exception->getStatusCode() == 500) {
            return response()->view('auth-500', [], 500);
        }

        return parent::render($request, $exception);
    }
}
