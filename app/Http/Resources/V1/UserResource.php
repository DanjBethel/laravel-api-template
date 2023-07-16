<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

/**
 * @property-read string $name
 * @property-read string $email
 * @property-read CarbonInterface $created_at
 */
final class UserResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'name'    => $this->name,
            'email'   => $this->email,
            'created' => new DateResource(
                resource: $this->created_at
            ),
        ];
    }
}
