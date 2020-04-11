<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Models\Coordinates;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CoordinatesResource
 * @package App\Domain\Weather\Resources
 *
 * @property Coordinates $resource
 */
class CoordinatesResource extends JsonResource
{
    /**
     * CoordinatesResource constructor.
     *
     * @param Coordinates $coordinates
     */
    public function __construct(Coordinates $coordinates)
    {
        parent::__construct($coordinates);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'lat' => $this->resource->getLat(),
            'lon' => $this->resource->getLon(),
        ];
    }
}
