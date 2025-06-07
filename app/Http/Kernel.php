<?php
namespace App\Http;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Middleware\HandleCors;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array<class-string, class-string>
     */
    protected $middleware = [
        HandleCors::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\SetCacheHeaders::class,
        StartSession::class,
        ShareErrorsFromSession::class,
        SubstituteBindings::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array<class-string, class-string>
     */
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'bindings' => SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\EnsurePasswordIsConfirmed::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'role' => RoleMiddleware::class, //
         // Adicione esta linha
         'gerente' => [
         'auth',
          'permission:dashboard.gerente'
        ],
         'supervisor1' => [
          'auth',
         'permission:dashboard.supervisor1'
       ],
         'supervisor2' => [
         'auth',
         'permission:dashboard.supervisor2'
       ],
    ];
}
