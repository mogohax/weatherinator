<?php

namespace App\Domain\Weather\Libs\OpenWeatherMap;

use GuzzleHttp\Command\Result;

/**
 * A class representing a weather response from OpenWeather api
 *
 * Class WeatherResponse
 * @package App\Domain\Weather\Libs\OpenWeatherMap
 */
class WeatherResponse
{
    /**
     * @var Result
     */
    private $weatherResult;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $windSpeed;

    /**
     * @var int
     */
    private $windDeg;

    /**
     * @var float
     */
    private $temp;

    /**
     * @var float
     */
    private $feels_like;

    /**
     * @var int
     */
    private $pressure;

    /**
     * @var int
     */
    private $humidity;

    /**
     * @var float
     */
    private $lon;

    /**
     * @var float
     */
    private $lat;

    /**
     * @param Result $weatherResult
     */
    public function __construct(Result $weatherResult)
    {
        $this->weatherResult = $weatherResult;

        $this->id = data_get($this->weatherResult, 'id');
        $this->name = data_get($this->weatherResult, 'name');
        $this->windSpeed = data_get($this->weatherResult, 'wind.speed');
        $this->windDeg = data_get($this->weatherResult, 'wind.deg');
        $this->temp = data_get($this->weatherResult, 'main.temp');
        $this->feels_like = data_get($this->weatherResult, 'main.feels_like');
        $this->pressure = data_get($this->weatherResult, 'main.pressure');
        $this->humidity = data_get($this->weatherResult, 'main.humidity');

        $this->lon = data_get($this->weatherResult, 'coord.lon');
        $this->lat = data_get($this->weatherResult, 'coord.lat');
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }

    /**
     * @return int
     */
    public function getWindDeg(): int
    {
        return $this->windDeg;
    }

    /**
     * @return float
     */
    public function getTemp(): float
    {
        return $this->temp;
    }

    /**
     * @return float
     */
    public function getFeelsLike(): float
    {
        return $this->feels_like;
    }

    /**
     * @return int
     */
    public function getPressure(): int
    {
        return $this->pressure;
    }

    /**
     * @return int
     */
    public function getHumidity(): int
    {
        return $this->humidity;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }
}
