<?php


namespace App\Domain\Weather\Interfaces;


use App\Domain\Weather\Exceptions\WeatherProviderNotFoundException;

interface WeatherProviderFactory
{
    /**
     * Creates a weather provider from given name
     *
     * @param string $provider
     * @return WeatherProvider
     * @throws WeatherProviderNotFoundException
     */
    public function make(string $provider): WeatherProvider;
}
