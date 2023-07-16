<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentEncoding
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);


        if (in_array('gzip', $request->getEncodings()) && function_exists('gzencode')) {
            $response->setContent(gzencode($response->getContent(), 9));

            $response->headers->add([
                'Content-Encoding' => 'gzip',
            ]);
        }

        return $response;
    }
}
