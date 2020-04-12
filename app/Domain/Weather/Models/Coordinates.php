<?php

namespace App\Domain\Weather\Models;

use Assert\Assertion;

/**
 * Class Coordinates
 * @package App\Domain\Weather\Models
 *
 * A value class/object to store coordinates
 */
class Coordinates
{
    /**
     * @var float
     */
    private $lon;

    /**
     * @var float
     */
    private $lat;

    /**
     * Coordinates constructor.
     *
     * @param float $lon
     * @param float $lat
     *
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(float $lon, float $lat)
    {
        // Assert that longitude is valid
        Assertion::between($lon, -180, 180);

        // Assert that latitude is valid
        Assertion::between($lat, -90, 90);

        $this->lon = $lon;
        $this->lat = $lat;
    }

    /**
     * Get Longitude
     *
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * Get Latitude
     *
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }
}
