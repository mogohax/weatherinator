<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Weather\Resources\WeatherDataResource;
use App\Domain\Weather\Services\WeatherDataService;
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
     * @param WeatherDataService $weatherDataService
     * @return WeatherDataResource
     * @throws \Assert\AssertionFailedException
     */
    public function getWeather(GetWeatherRequest $request, WeatherDataService $weatherDataService): WeatherDataResource
    {
        $weatherData = $weatherDataService->getWeatherData(
            $request->get('city'),
            $request->get('provider', 'openweather'),
            $request->get('api_key')
        );

        return new WeatherDataResource($weatherData);
    }
}
