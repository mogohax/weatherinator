<?php

namespace Tests\Unit\Domain\Weather\Libs\OpenWeatherMap;

use App\Domain\Weather\Libs\OpenWeatherMap\OpenWeatherMapClient;
use App\Domain\Weather\Libs\OpenWeatherMap\WeatherResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class OpenWeatherMapClientTest extends TestCase
{
    /**
     * @test
     * @covers OpenWeatherMapClient::factory()
     */
    public function can_construct_self()
    {
        $this->assertInstanceOf(
            OpenWeatherMapClient::class,
            OpenWeatherMapClient::factory()
        );
    }

    /**
     * @test
     *
     * @covers OpenWeatherMapClient::weather()
     */
    public function returns_a_correct_weather_response_object()
    {
        $responseJson = "{\"coord\":{\"lon\":11.11,\"lat\":22.22},\"weather\":[{\"id\":803,\"main\":\"Clouds\",\"description\":\"broken clouds\",\"icon\":\"04d\"}],\"base\":\"stations\",\"main\":{\"temp\":333.33,\"feels_like\":444.44,\"temp_min\":285.15,\"temp_max\":285.93,\"pressure\":1014,\"humidity\":25},\"visibility\":10000,\"wind\":{\"speed\":22.2,\"deg\":210},\"clouds\":{\"all\":75},\"dt\":1586707558,\"sys\":{\"type\":1,\"id\":1883,\"country\":\"LT\",\"sunrise\":1586661764,\"sunset\":1586711759},\"timezone\":10800,\"id\":593116,\"name\":\"Mocktown\",\"cod\":200}";

        /** @var WeatherResponse $weatherResponse */
        $weatherResponse = $this
            ->getMockedClient(200, $responseJson)
            ->weather('any', 'any');

        $this->assertInstanceOf(
            WeatherResponse::class,
            $weatherResponse
        );

        $this->assertEquals(
            'Mocktown',
            $weatherResponse->getName()
        );

        $this->assertEquals(
            11.11,
            $weatherResponse->getLon()
        );

        $this->assertEquals(
            22.22,
            $weatherResponse->getLat()
        );

        $this->assertEquals(
            333.33,
            $weatherResponse->getTemp()
        );

        $this->assertEquals(
            444.44,
            $weatherResponse->getFeelsLike()
        );

        $this->assertEquals(
            25,
            $weatherResponse->getHumidity()
        );

        $this->assertEquals(
            22.2,
            $weatherResponse->getWindSpeed()
        );

        $this->assertEquals(
            210,
            $weatherResponse->getWindDeg()
        );

        $this->assertEquals(
            1014,
            $weatherResponse->getPressure()
        );
    }

    /**
     * Mocked client helper
     *
     * @param $responseCode
     * @param null $body
     * @return OpenWeatherMapClient
     */
    private function getMockedClient($responseCode, $body = null): OpenWeatherMapClient
    {
        $mockedHandler = new MockHandler([
            new Response($responseCode, [], $body),
        ]);

        $client = new Client(['handler' => HandlerStack::create($mockedHandler)]);

        return OpenWeatherMapClient::factory([], $client);
    }
}
