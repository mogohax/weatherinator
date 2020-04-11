<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Models\Speed\Speed;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SpeedResource
 * @package App\Domain\Weather\Resources
 *
 * @property Speed $resource
 */
class SpeedResource extends JsonResource
{
    /**
     * SpeedResource constructor.
     *
     * @param Speed $resource
     */
    public function __construct(Speed $resource)
    {
        parent::__construct($resource);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'value' => $this->resource->getValue(),
            'units' => UnitsResource::make($this->resource->getUnits())
        ];
    }
}
