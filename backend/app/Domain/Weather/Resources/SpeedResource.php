<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Models\Speed\Speed;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * Class SpeedResource
 * @package App\Domain\Weather\Resources
 *
 * @Schema(
 *     title="SpeedResource",
 *     description="Speed model",
 *     @Property(
 *         property="value",
 *         description="Speed value",
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
