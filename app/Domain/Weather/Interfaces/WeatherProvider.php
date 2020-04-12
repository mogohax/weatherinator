<?php


namespace App\Domain\Weather\Interfaces;


use App\Domain\Weather\Models\WeatherData;

interface WeatherProvider
{
    /**
     * Provides Weather data by city name
     *
     * @param string $city
     * @return WeatherData
     */
    public function getCityWeather(string $city): WeatherData;

    /**
     * Sets the api key
     *
     * @param string $apiKey
     * @return $this
     */
    public function setApiKey(string $apiKey): self;
}
