<?php

namespace Tests\Unit\Domain\Weather\Factories;

use App\Domain\Weather\Exceptions\WeatherProviderNotFoundException;
use App\Domain\Weather\Factories\WeatherProviderFactory;
use App\Domain\Weather\Providers\RandomWeatherProvider;
use PHPUnit\Framework\TestCase;

class WeatherProviderFactoryTest extends TestCase
{
    private $weatherFactory;

    public function setUp(): void
    {
        $this->weatherFactory = new WeatherProviderFactory();
    }

    /**
     * @test
     * @covers WeatherProviderFactory::make
     */
    public function can_create_random_weather_provider(): void
    {
        $provider = $this->weatherFactory->make(RandomWeatherProvider::NAME);

        $this->assertInstanceOf(
            RandomWeatherProvider::class,
            $provider
        );
    }

    /**
     * @test
     * @covers WeatherProviderFactory::make
     */
    public function throws_exception_with_nonexistant_provider_names()
    {
        $this->expectException(WeatherProviderNotFoundException::class);

        $this->weatherFactory->make('this_provider_does_not_exist');
    }
}
