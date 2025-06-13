<?php
namespace App\Http;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Routing\Middleware\ValidateSignature;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Middleware\HandleCors;

use Illuminate\Http\Middleware\TrustProxies;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Auth\Middleware\Authorize;
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array<class-string, class-string>
     */
    protected $middleware = [
        HandleCors::class,
        TrustProxies::class,
        SetCacheHeaders::class,
        StartSession::class,
        ShareErrorsFromSession::class,
        SubstituteBindings::class,
    ];

    //routemiddlewareGroups
      protected $routeMiddleware = [
          'auth' => Authenticate::class,
          'bindings' => SubstituteBindings::class,
          'can' => Authorize::class,
          'guest'=>RedirectIfAuthenticated::class,
          'password.confirm' => EnsureEmailIsVerified::class,
          'signed'=>ValidateSignature::class,
          'throttle' => ThrottleRequests::class,
        // spatie

 ];
}
