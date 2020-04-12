<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Interfaces\Units;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * Class UnitsResource
 * @package App\Domain\Weather\Resources
 *
 * @Schema(
 *     title="UnitsResource",
 *     description="Measuring units model",
 *     @Property(
 *         property="name",
 *         description="Name of measuring unit",
 *         type="string",
 *     ),
 *     @Property(
 *         property="symbol",
 *         description="Symbol of measuring unit",
 *         type="string",
 *     ),
 * )
 */
class UnitsResource extends JsonResource
{
    /**
     * UnitsResource constructor.
     *
     * @param $resource
     */
    public function __construct(Units $resource)
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
            'name' => $this->resource->getName(),
            'symbol' => $this->resource->getSymbol(),
        ];
    }}
