<?php

declare(strict_types=1);

namespace App\Http\Responses\Api\V1;

use Illuminate\Contracts\Support\Responsable;
use App\Http\Responses\Concerns\ReturnsJsonResponse;

final class MessageResponse implements Responsable
{
    use ReturnsJsonResponse;
}
