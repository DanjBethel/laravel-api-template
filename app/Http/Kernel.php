<?php

declare(strict_types=1);

namespace App\Http;

use Spatie\Csp\AddCspHeaders;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CacheHeaders;
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\ContentEncoding;
use Illuminate\Auth\Middleware\Authorize;
use App\Http\Middleware\ValidateSignature;
use Illuminate\Http\Middleware\HandleCors;
use App\Http\Middleware\EnsureEmailIsVerified;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Http\Middleware\SetCacheHeaders;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\JsonApiResponseMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Treblle\SecurityHeaders\Http\Middleware\RemoveHeaders;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Treblle\SecurityHeaders\Http\Middleware\SetReferrerPolicy;
use Treblle\SecurityHeaders\Http\Middleware\PermissionsPolicy;
use Treblle\SecurityHeaders\Http\Middleware\ContentTypeOptions;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Treblle\SecurityHeaders\Http\Middleware\StrictTransportSecurity;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Treblle\SecurityHeaders\Http\Middleware\CertificateTransparencyPolicy;

final class Kernel extends HttpKernel
{
    protected $middleware
        = [
            // \App\Http\Middleware\TrustHosts::class,
            TrustProxies::class,
            HandleCors::class,
            PreventRequestsDuringMaintenance::class,
            ValidatePostSize::class,
            TrimStrings::class,
            ConvertEmptyStringsToNull::class,
        ];

    protected $middlewareGroups
        = [
            'web' => [],

            'api' => [
                EnsureFrontendRequestsAreStateful::class,
                ThrottleRequests::class.':api',
                SubstituteBindings::class,
                JsonApiResponseMiddleware::class,
                ContentEncoding::class,
                CacheHeaders::class,
                RemoveHeaders::class,
                StrictTransportSecurity::class,
                SetReferrerPolicy::class,
                PermissionsPolicy::class,
                ContentTypeOptions::class,
                CertificateTransparencyPolicy::class,
                AddCspHeaders::class,
            ],
        ];

    protected $middlewareAliases
        = [
            'auth'             => Authenticate::class,
            'auth.basic'       => AuthenticateWithBasicAuth::class,
            'auth.session'     => AuthenticateSession::class,
            'cache.headers'    => SetCacheHeaders::class,
            'can'              => Authorize::class,
            'guest'            => RedirectIfAuthenticated::class,
            'password.confirm' => RequirePassword::class,
            'signed'           => ValidateSignature::class,
            'throttle'         => ThrottleRequests::class,
            'verified'         => EnsureEmailIsVerified::class,
        ];
}
