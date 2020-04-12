<?php

namespace App\Domain\Weather\Providers;

use App\Domain\Weather\Interfaces\WeatherProvider as WeatherProviderInterface;
use App\Domain\Weather\Libs\OpenWeatherMap\OpenWeatherMapClient;
use App\Domain\Weather\Libs\OpenWeatherMap\WeatherResponse;
use App\Domain\Weather\Models\Coordinates;
use App\Domain\Weather\Models\Speed\Speed;
use App\Domain\Weather\Models\Temperature\Temperature;
use App\Domain\Weather\Models\WeatherData;

/**
 * Decorate OpenWeatherMap client into a WeatherProvider
 *
 * Class OpenWeatherProvider
 * @package App\Domain\Weather\Providers
 */
class OpenWeatherProvider implements WeatherProviderInterface
{
    const NAME = 'openweather';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var OpenWeatherMapClient
     */
    private $weatherMapClient;

    /**
     * OpenWeatherProvider constructor.
     * @param OpenWeatherMapClient $weatherMapClient
     */
    public function __construct(OpenWeatherMapClient $weatherMapClient)
    {
        $this->weatherMapClient = $weatherMapClient;
    }

    /**
     * @inheritDoc
     * @throws \Assert\AssertionFailedException
     */
    public function getCityWeather(string $city): WeatherData
    {
        /** @var WeatherResponse $response */
        $response = $this->weatherMapClient->weather($city, $this->apiKey);

        return new WeatherData(
            $response->getName(),
            Temperature::Kelvin($response->getTemp()),
            Temperature::Kelvin($response->getFeelsLike()),
            Speed::MS($response->getWindSpeed()),
            new Coordinates($response->getLon(), $response->getLat())
        );
    }

    /**
     * @inheritDoc
     */
    public function setApiKey(string $apiKey): WeatherProviderInterface
    {
        $this->apiKey = $apiKey;

        return $this;
    }
}
