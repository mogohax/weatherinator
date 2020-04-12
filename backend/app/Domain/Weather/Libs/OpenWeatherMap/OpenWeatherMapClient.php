<?php

namespace App\Domain\Weather\Libs\OpenWeatherMap;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Result;

/**
 * A client library to interact with OpenWeatherMap API
 *
 * Class OpenWeatherMapClient
 * @package App\Domain\Weather\Libs\OpenWeatherMap
 */
class OpenWeatherMapClient extends GuzzleClient
{
    public static function factory(array $description = [], ClientInterface $client = null): self
    {
        $client = $client ?? new Client();

        $defaultDescription = [
            'baseUrl' => 'https://api.openweathermap.org/data/2.5/',
            'operations' => [
                'fetchWeather' => [
                    'httpMethod' => 'GET',
                    'uri' => 'weather',
                    'responseClass' => 'WeatherResult',
                    'additionalParameters' => [
                        'location' => 'query',
                    ],
                ],
            ],
            'models' => [
                'WeatherResult' => [
                    "type" => "object",
                    "additionalProperties" => [
                        'location' => 'json'
                    ]
                ],
            ],

        ];

        return new self($client, new Description(array_merge($defaultDescription, $description)));
    }

    /**
     * Get weather from OpenWeather api
     *
     * @param string $city
     * @param string $appId
     * @return WeatherResponse
     */
    public function weather(string $city, string $appId): WeatherResponse
    {
        /** @var Result $result */
        $result = $this->fetchWeather(['q' => $city, 'appid' => $appId]);

        return new WeatherResponse($result);
    }
}
