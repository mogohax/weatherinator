<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Models\Coordinates;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * Class CoordinatesResource
 * @package App\Domain\Weather\Resources
 *
 * @Schema(
 *     title="CoordinatesResource",
 *     description="Coordiantes model",
 *     @Property(
 *         property="lat",
 *         description="Latitude",
 *         type="number",
 *     ),
 *     @Property(
 *         property="lon",
 *         description="Longitude",
 *         type="number",
 *     ),
 * )
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
