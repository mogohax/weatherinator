<?php

namespace App\Domain\Weather\Services;

use App\Domain\Weather\Interfaces\WeatherProviderFactory;
use App\Domain\Weather\Models\WeatherData;

/**
 * A service to get weather data from multiple weather data providers
 *
 * Class WeatherDataService
 * @package App\Domain\Weather\Services
 */
class WeatherDataService
{
    /**
     * @var WeatherProviderFactory
     */
    private $providerFactory;

    /**
     * WeatherDataService constructor.
     *
     * @param WeatherProviderFactory $providerFactory
     */
    public function __construct(WeatherProviderFactory $providerFactory)
    {
        $this->providerFactory = $providerFactory;
    }

    /**
     * Gets weather data for a given city from a specific weather provider
     *
     * @param string $cityName
     * @param string $apiKey
     * @param string $provider
     *
     * @return WeatherData
     */
    public function getWeatherData(string $cityName, string $provider, string $apiKey): WeatherData
    {
        // get weather provider from factory
        $provider = $this->providerFactory->make($provider);

        // get and return the weather data
        return $provider->setApiKey($apiKey)->getCityWeather($cityName);
    }
}
