<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class DateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'human'     => $this->resource->diffForHumans(),
            'timestamp' => $this->resource->timestamp,
            'string'    => $this->resource->toDateTimeString(),
        ];
    }
}
