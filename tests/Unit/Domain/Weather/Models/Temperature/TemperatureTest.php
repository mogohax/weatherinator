<?php

namespace Tests\Unit\Domain\Weather\Models\Temperature;

use App\Domain\Weather\Models\Temperature\Celsius;
use App\Domain\Weather\Models\Temperature\Fahrenheit;
use App\Domain\Weather\Models\Temperature\Kelvin;
use App\Domain\Weather\Models\Temperature\Temperature;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;

class TemperatureTest extends TestCase
{
    /**
     * @test
     * @covers Temperature::Celsius
     *
     * @throws AssertionFailedException
     */
    public function cannot_create_invalid_celsius_temperature()
    {
        $this->expectException(AssertionFailedException::class);

        Temperature::Celsius(-999);
    }

    /**
     * @test
     * @covers Temperature::Celsius, Temperature::getValue, Temperature::getUnits
     *
     * @throws AssertionFailedException
     */
    public function can_create_valid_celsius_temperature()
    {
        $temperature = Temperature::Celsius(4.4);

        $this->assertEquals(
            4.4,
            $temperature->getValue()
        );

        $this->assertInstanceOf(
            Celsius::class,
            $temperature->getUnits()
        );
    }

    /**
     * @test
     * @covers Temperature::Fahrenheit()
     *
     * @throws AssertionFailedException
     */
    public function cannot_create_invalid_fahrenheit_temperature()
    {
        $this->expectException(AssertionFailedException::class);

        Temperature::Fahrenheit(-999);
    }

    /**
     * @test
     *
     * @throws AssertionFailedException
     * @covers Temperature::Fahrenheit(), Temperature::getValue, Temperature::getUnits
     */
    public function can_create_valid_fahrenheit_temperature()
    {
        $temperature = Temperature::Fahrenheit(451);

        $this->assertEquals(
            451,
            $temperature->getValue()
        );

        $this->assertInstanceOf(
            Fahrenheit::class,
            $temperature->getUnits()
        );
    }

    /**
     * @test
     * @covers Temperature::Kelvin()
     *
     * @throws AssertionFailedException
     */
    public function cannot_create_invalid_kelvin_temperature()
    {
        $this->expectException(AssertionFailedException::class);

        Temperature::Kelvin(-1);
    }

    /**
     * @test
     * @covers Temperature::Kelvin(), Temperature::getValue, Temperature::getUnits
     *
     * @throws AssertionFailedException
     */
    public function can_create_valid_kelvin_temperature()
    {
        $temperature = Temperature::Kelvin(23);

        $this->assertEquals(
            23,
            $temperature->getValue()
        );

        $this->assertInstanceOf(
            Kelvin::class,
            $temperature->getUnits()
        );
    }
}
