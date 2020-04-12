<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Weather\Providers\OpenWeatherProvider;
use App\Domain\Weather\Resources\WeatherDataResource;
use App\Domain\Weather\Services\WeatherDataService;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\V1\GetWeatherRequest;
use OpenApi\Annotations\AdditionalProperties;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\JsonContent;
use OpenApi\Annotations\Parameter;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;
use OpenApi\Annotations\Tag;

/**
 *
 * Class WeatherController
 * @package App\Http\Controllers\Api\V1
 *
 * Handles weather API calls
 * @Tag (
 *     name="Weather",
 *     description="Weather actions"
 * )
 */
class WeatherController extends BaseApiController
{
    /**
     * @Get(
     *     path="/api/v1/weather",
     *     operationId="getWeather",
     *     tags={"Weather"},
     *     summary="Gets current weather data",
     *     description="Returns weather data for a given city",
     *     @Parameter(
     *         name="city",
     *         description="City name",
     *         required=true,
     *         in="query",
     *         @Schema(type="string")
     *     ),
     *     @Parameter(
     *         name="api_key",
     *         description="The API key",
     *         required=true,
     *         in="query",
     *         @Schema(type="string")
     *     ),
     *     @Parameter(
     *         name="provider",
     *         description="Weather provider",
     *         required=false,
     *         in="query",
     *         @Schema(type="string", enum={"openweather", "random"})
     *     ),
     *     @Response(
     *         response="200",
     *         description="Successful Response",
     *         @JsonContent(ref="#components/schemas/WeatherDataResource")
     *     ),
     *     @Response(
     *         response="422",
     *         description="Validation errors",
     *         @JsonContent(
     *             @Property(property="message", type="string"),
     *             @Property(property="errors", type="array", @Items(@AdditionalProperties()))
     *         )
     *     )
     * )
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
            $request->get('provider', OpenWeatherProvider::NAME),
            $request->get('api_key')
        );

        return new WeatherDataResource($weatherData);
    }
}
