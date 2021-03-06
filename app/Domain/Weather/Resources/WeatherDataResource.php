<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Models\WeatherData;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * Class WeatherDataResource
 * @package App\Domain\Weather\Resources
 *
 *
 * @Schema(
 *     title="WeatherDataResource",
 *     description="Weather Data response model",
 *     @Property(
 *         property="city",
 *         description="City data holder",
 *         type="object",
 *         @Property(property="name", type="string"),
 *         @Property(
 *             property="location",
 *             type="object",
 *             ref="#components/schemas/CoordinatesResource"
 *         )
 *     ),
 *     @Property(
 *         property="temperature",
 *         description="Temperature data",
 *         type="object",
 *         @Property(
 *             property="current",
 *             description="Current temperature",
 *             type="object",
 *             ref="#components/schemas/TemperatureResource"
 *         ),
 *         @Property(
 *             property="feels_like",
 *             description="Feels like temperature",
 *             type="object",
 *             ref="#components/schemas/TemperatureResource"
 *         ),
 *     ),
 *     @Property(
 *         property="wind_speed",
 *         description="Wind speed",
 *         type="object",
 *         ref="#components/schemas/SpeedResource"
 *     ),
 * )
 *
 */
class WeatherDataResource extends JsonResource
{
    /**
     * WeatherDataResource constructor.
     *
     * @param WeatherData $weatherData
     */
    public function __construct(WeatherData $weatherData)
    {
        static::withoutWrapping();
        parent::__construct($weatherData);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {

        return [
            'city' => [
                'name' => $this->resource->getCityName(),
                'location' => CoordinatesResource::make($this->resource->getCityCoordinates())
            ],

            'temperature' => [
                'feels_like' => TemperatureResource::make($this->resource->getFeelsLike()),
                'current' => TemperatureResource::make($this->resource->getCurrentTemperature())
            ],

            'wind_speed' => SpeedResource::make($this->resource->getWindSpeed())
        ];
    }
}
