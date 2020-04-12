<?php

namespace App\Domain\Weather\Providers;

use App\Domain\Weather\Interfaces\WeatherProvider;
use App\Domain\Weather\Models\Coordinates;
use App\Domain\Weather\Models\Speed\Speed;
use App\Domain\Weather\Models\Temperature\Temperature;
use App\Domain\Weather\Models\WeatherData;

class RandomWeatherProvider implements WeatherProvider
{
    /**
     * Provider name, to be used in factories and other places
     * instead of hardcoding it in
     */
    const NAME = 'random';

    /**
     * @inheritDoc
     * @throws \Assert\AssertionFailedException
     */
    public function getCityWeather(string $city): WeatherData
    {
        return new WeatherData(
            $city,
            $this->getRandomTemperature(8, 21),
            $this->getRandomTemperature(5, 18),
            $this->getRandomSpeed(0, 30),
            $this->getRandomCoordinates()
        );
    }

    /**
     * @inheritDoc
     */
    public function setApiKey(string $apiKey): WeatherProvider
    {
        // ignore api key
        return $this;
    }

    /**
     * Generates random temperature in the given range
     *
     * @param int $min
     * @param int $max
     * @return Temperature
     * @throws \Assert\AssertionFailedException
     */
    private function getRandomTemperature(int $min, int $max): Temperature
    {
        return Temperature::Celsius(rand($min * 10, $max * 10) / 10);
    }

    /**
     * Generates a random Speed in the given range
     *
     * @param int $min
     * @param int $max
     * @return Speed
     * @throws \Assert\AssertionFailedException
     */
    private function getRandomSpeed(int $min, int $max): Speed
    {
        $randomValue = rand($min * 10, $max * 10) / 10;
        return Speed::MS($randomValue);
    }

    /**
     * Generates random Coordinates
     *
     * @return Coordinates
     * @throws \Assert\AssertionFailedException
     */
    public function getRandomCoordinates()
    {
        return new Coordinates(
            rand(-180 * 100, 180 * 100) / 100,
            rand(-90 * 100, 90 * 100) / 100
        );
    }
}
