<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class RegisterUserController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return response()->noContent();
    }
}
