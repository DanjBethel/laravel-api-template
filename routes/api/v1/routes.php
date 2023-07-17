<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/**
 * Authenticated Routes
 */
Route::middleware(['auth:api'])->group(static function (): void {
    //
});

/**
 * Unauthenticated Routes
 */
Route::middleware([])->group(static function (): void {
    /**
     * Ping Routes
     */
    Route::prefix('ping')->as('ping:')->group(
        base_path('routes/api/v1/ping.php'),
    );
});

require __DIR__.'/../../auth.php';
