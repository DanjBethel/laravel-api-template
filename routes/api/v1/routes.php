<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/**
 * Ping Routes
 */
Route::prefix('ping')->as('ping:')->group(
    base_path('routes/api/v1/ping.php'),
);

/**
 * Authenticated Routes
 */
//Route::middleware(middleware: ['auth:api'])->group(static function (): void {
//});


require __DIR__.'/../../auth.php';
