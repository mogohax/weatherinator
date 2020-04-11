<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Interfaces\Units;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UnitsResource
 * @package App\Domain\Weather\Resources
 *
 * @property Units $resource
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
