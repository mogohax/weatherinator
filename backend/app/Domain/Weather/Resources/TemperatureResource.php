<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Models\Temperature\Temperature;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TemperatureResource
 * @package App\Domain\Weather\Resources
 *
 * @property Temperature $resource
 */
class TemperatureResource extends JsonResource
{
    /**
     * TemperatureResource constructor.
     *
     * @param Temperature $resource
     */
    public function __construct(Temperature $resource)
    {
        parent::__construct($resource);
    }

    /**
     * @param $request
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
