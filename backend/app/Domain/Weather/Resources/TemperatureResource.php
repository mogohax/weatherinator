<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Models\Temperature\Temperature;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * Class TemperatureResource
 * @package App\Domain\Weather\Resources
 *
 * @Schema(
 *     title="TemperatureResource",
 *     description="Temperature model",
 *     @Property(
 *         property="value",
 *         description="Temperature value",
 *         type="number",
 *     ),
 *     @Property(
 *         property="units",
 *         description="Measuring units",
 *         type="object",
 *         ref="#components/schemas/UnitsResource"
 *     ),
 * )
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
