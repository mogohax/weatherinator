<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Weather\Models\Coordinates;
use App\Domain\Weather\Models\Speed\Speed;
use App\Domain\Weather\Models\Temperature\Temperature;
use App\Domain\Weather\Models\WeatherData;
use App\Domain\Weather\Resources\WeatherDataResource;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\V1\GetWeatherRequest;

/**
 * Class WeatherController
 * @package App\Http\Controllers\Api\V1
 *
 * Handles weather API calls
 */
class WeatherController extends BaseApiController
{
    /**
     *
     * @param GetWeatherRequest $request
     *
     * @return WeatherDataResource
     * @throws \Assert\AssertionFailedException
     */
    public function getWeather(GetWeatherRequest $request): WeatherDataResource
    {
        return new WeatherDataResource(new WeatherData(
            'Vilnius',
            Temperature::Celsius(21),
            Temperature::Celsius(15),
            Speed::MS(4.1),
            new Coordinates(0,0)
        ));
    }
}
