<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Ping;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use App\Http\Responses\Api\V1\MessageResponse;

final class ShowController
{
    public function __invoke(Request $request): Responsable
    {
        return new MessageResponse(
            data: [
                'message' => strval(trans('messages.service.online')),
            ],
        );
    }
}
