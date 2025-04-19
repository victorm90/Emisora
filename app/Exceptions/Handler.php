<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // Añade este método para manejar errores 404 en rutas de admin
    public function render($request, Throwable $exception)
    {
        // Si es un error 404 y la ruta empieza con 'admin/'
        if ($exception instanceof NotFoundHttpException && str_starts_with($request->path(), 'admin')) {
            return redirect('/')
                ->with('error', 'Violación de seguridad: La ruta no existe.');
        }

        return parent::render($request, $exception);
    }
}