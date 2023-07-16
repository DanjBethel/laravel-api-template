<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

final class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware(['api', 'treblle'])
                ->prefix('api')
                ->as('api:')
                ->group(
                    base_path('routes/api.php')
                );
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for(
            name: 'api',
            callback: static fn (Request $request): Limit => Limit::perMinute(
                maxAttempts: 60,
            )->by(
                key: $request->user()?->id ?: $request->ip(),
            ),
        );
    }
}
