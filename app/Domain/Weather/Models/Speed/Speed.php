<?php


namespace App\Domain\Weather\Models\Speed;

use App\Domain\Weather\Interfaces\SpeedUnits;
use Assert\Assertion;

/**
 * Class Speed
 * @package App\Domain\Weather\Models\Speed
 *
 * Value class/object to store speed
 */
class Speed
{
    /**
     * @var float
     */
    private $value;

    /**
     * @var SpeedUnits
     */
    private $units;

    /**
     * Speed constructor.
     *
     * Using a private constructor to provide only a few fixed ways to construct a Speed object
     * Might also use a Factory.
     *
     * @param float $value
     * @param SpeedUnits $units
     * @throws \Assert\AssertionFailedException
     */
    private function __construct(float $value, SpeedUnits $units)
    {
        // Speed cannot be negative
        Assertion::min($value, 0);

        $this->value = $value;
        $this->units = $units;
    }

    /**
     * Get speed value
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * Get speed unit
     *
     * @return SpeedUnits
     */
    public function getUnits(): SpeedUnits
    {
        return $this->units;
    }

    /**
     * Create a kilometers per hour speed value object
     *
     * @param float $value
     * @return Speed
     * @throws \Assert\AssertionFailedException
     */
    public static function KMH(float $value): Speed
    {
        return new self($value, new KilometersPerHour());
    }

    /**
     * Create a meters per second speed value object
     *
     * @param float $value
     * @return Speed
     * @throws \Assert\AssertionFailedException
     */
    public static function MS(float $value)
    {
        return new self($value, new MetersPerSecond());
    }
}
