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
                'name' => 'Vilnius',
                'location' => [
                    'lat' => 0,
                    'lon' => 0,
                ]
            ],
            'temperature' => [
                'feels_like' => [
                    'value' => 8,
                    'units' => [
                        'name' => 'celsius',
                        'symbol' => 'C',
                    ]
                ],
                'current' => [
                    'value' => 13,
                    'units' => [
                        'name' => 'celsius',
                        'symbol' => 'C',
                    ]
                ]
            ],
            'wind_speed' => [
                'value' => 4.4,
                'units' => [
                    'name' => 'meters per second',
                    'symbol' => 'm/s'
                ]
            ]
        ];
    }
}
