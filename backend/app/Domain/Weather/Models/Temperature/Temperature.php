<?php

namespace App\Domain\Weather\Models\Temperature;

use App\Domain\Weather\Interfaces\TemperatureUnits;
use Assert\Assertion;

/**
 * Class Temperature
 * @package App\Domain\Weather\Models\Temperature
 *
 * A value class/object to store temperature
 */
class Temperature
{
    /**
     * @var float
     */
    private $value;

    /**
     * @var TemperatureUnits
     */
    private $units;

    /**
     * Temperature constructor.
     *
     * Using a private constructor to provide only a few fixed ways to construct a Temperature object
     * Might also use a Factory.
     *
     * @param float $value
     * @param TemperatureUnits $units
     */
    private function __construct(float $value, TemperatureUnits $units)
    {
        $this->value = $value;
        $this->units = $units;
    }

    /**
     * Get the temperature value
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return TemperatureUnits
     */
    public function getUnits(): TemperatureUnits
    {
        return $this->units;
    }

    /**
     * Create a Celsius Temperature
     *
     * @param float $value
     * @return Temperature
     * @throws \Assert\AssertionFailedException
     */
    public static function Celsius(float $value): Temperature
    {
        // Cannot be colder than absolute zero
        Assertion::min($value, -273.15);

        return new self($value, new Celsius());
    }

    /**
     * Create a Fahrenheit temperature
     *
     * @param float $value
     * @return Temperature
     * @throws \Assert\AssertionFailedException
     */
    public static function Fahrenheit(float $value): Temperature
    {
        // Cannot be colder than absolute zero
        Assertion::min($value, -459.67);

        return new self($value, new Fahrenheit());
    }

    /**
     * Create a Kelvin temperature
     *
     * @param float $value
     * @return Temperature
     * @throws \Assert\AssertionFailedException
     */
    public static function Kelvin(float $value): Temperature
    {
        // Cannot be colder than absolute zero
        Assertion::min($value, 0);

        return new self($value, new Kelvin());
    }


}
