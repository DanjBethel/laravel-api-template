<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use function response;

class LogoutController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return response()->noContent();
    }
}