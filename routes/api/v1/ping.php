<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Ping\ShowController;

Route::get(
    '/',
    ShowController::class,
)->name('show');
