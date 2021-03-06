<?php

namespace App\Domain\Weather\Factories;

use App\Domain\Weather\Exceptions\WeatherProviderNotFoundException;
use \App\Domain\Weather\Interfaces\WeatherProviderFactory as WeatherProviderFactoryInterface;
use App\Domain\Weather\Interfaces\WeatherProvider;
use App\Domain\Weather\Libs\OpenWeatherMap\OpenWeatherMapClient;
use App\Domain\Weather\Providers\OpenWeatherProvider;
use App\Domain\Weather\Providers\RandomWeatherProvider;

class WeatherProviderFactory implements WeatherProviderFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function make(string $providerName): WeatherProvider
    {
        $provider = null;

        switch ($providerName) {
            case RandomWeatherProvider::NAME:
                $provider = new RandomWeatherProvider();
                break;
            case OpenWeatherProvider::NAME:
                $provider = new OpenWeatherProvider(
                    OpenWeatherMapClient::factory()
                );
                break;
            default:
                throw new WeatherProviderNotFoundException("Could not find a weather provider named $providerName");
                break;
        }

        return $provider;
    }
}
