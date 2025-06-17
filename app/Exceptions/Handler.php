<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Spatie\Permission\Exceptions\UnauthorizedException;

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
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        //
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedException) {
            if ($request->header('X-Inertia')) {
                return redirect()->route('login')
                    ->withErrors(['permission' => 'Você não possui permissão para acessar esta página.']);
            }
            // Se não for Inertia, apenas redirecione com erro genérico
            return redirect()->route('login')
                ->with('error', 'Você não possui permissão para acessar esta página.');
        }

        return parent::render($request, $exception);
    }
}
