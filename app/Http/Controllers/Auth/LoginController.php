<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use function response;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): Response
    {
        return response()->noContent();
    }
}