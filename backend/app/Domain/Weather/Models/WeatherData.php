<?php

namespace App\Domain\Weather\Models;

use App\Domain\Weather\Models\Speed\Speed;
use App\Domain\Weather\Models\Temperature\Temperature;

/**
 * Class WeatherData
 * @package App\Domain\Weather\Models
 *
 * Model to hold weather data
 */
class WeatherData
{
    /**
     * @var string
     */
    private $cityName;

    /**
     * @var Temperature
     */
    private $currentTemperature;

    /**
     * @var Temperature
     */
    private $feelsLike;

    /**
     * @var Speed
     */
    private $windSpeed;

    /**
     * @var Coordinates
     */
    private $cityCoordinates;

    /**
     * WeatherData constructor.
     *
     * @param string $cityName
     * @param Temperature $currentTemperature
     * @param Temperature $feelsLike
     * @param Speed $windSpeed
     * @param Coordinates $cityCoordinates
     */
    public function __construct(
        string $cityName,
        Temperature $currentTemperature,
        Temperature $feelsLike,
        Speed $windSpeed,
        Coordinates $cityCoordinates
    )
    {
        $this->cityName = $cityName;
        $this->currentTemperature = $currentTemperature;
        $this->feelsLike = $feelsLike;
        $this->windSpeed = $windSpeed;
        $this->cityCoordinates = $cityCoordinates;
    }

    /**
     * Get City name
     *
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * Get current Temperature
     *
     * @return Temperature
     */
    public function getCurrentTemperature(): Temperature
    {
        return $this->currentTemperature;
    }

    /**
     * Get feels like Temperature
     * @return Temperature
     */
    public function getFeelsLike(): Temperature
    {
        return $this->feelsLike;
    }

    /**
     * Get wind speed
     *
     * @return Speed
     */
    public function getWindSpeed(): Speed
    {
        return $this->windSpeed;
    }

    /**
     * Get city coordinates
     *
     * @return Coordinates
     */
    public function getCityCoordinates(): Coordinates
    {
        return $this->cityCoordinates;
    }
}
