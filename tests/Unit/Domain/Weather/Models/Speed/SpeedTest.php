<?php

namespace Tests\Unit\Domain\Weather\Models\Speed;

use App\Domain\Weather\Models\Speed\KilometersPerHour;
use App\Domain\Weather\Models\Speed\MetersPerSecond;
use App\Domain\Weather\Models\Speed\Speed;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;

class SpeedTest extends TestCase
{
    /**
     * @test
     * @throws AssertionFailedException
     * @covers Speed::KMH
     */
    public function cannot_create_negative_kmh_speed()
    {
        $this->expectException(AssertionFailedException::class);

        Speed::KMH(-1);
    }

    /**
     * @test
     * @throws AssertionFailedException
     * @covers Speed::KMH, Speed::getValue(), Speed::getUnits()
     */
    public function can_create_valid_speed_in_kmh()
    {
        $speed = Speed::KMH(88);

        $this->assertEquals(
            88,
            $speed->getValue()
        );

        $this->assertInstanceOf(
            KilometersPerHour::class,
            $speed->getUnits()
        );
    }

    /**
     * @test
     * @covers Speed::MS
     * @throws AssertionFailedException
     */
    public function cannot_create_negative_ms_speed()
    {
        $this->expectException(AssertionFailedException::class);

        Speed::MS(-1);
    }

    /**
     * @test
     * @covers Speed::MS, Speed::getValue(), Speed::getUnits()
     * @throws AssertionFailedException
     */
    public function can_create_valid_speed_in_ms()
    {
        $speed = Speed::MS(42);

        $this->assertEquals(
            42,
            $speed->getValue()
        );

        $this->assertInstanceOf(
            MetersPerSecond::class,
            $speed->getUnits()
        );
    }
}
