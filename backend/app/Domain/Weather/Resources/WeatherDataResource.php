<?php

namespace App\Domain\Weather\Resources;

use App\Domain\Weather\Models\WeatherData;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class WeatherDataResource
 * @package App\Domain\Weather\Resources
 *
 * @property WeatherData $resource
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
