<?php

namespace App\Domain\Weather\Models\Temperature;

use App\Domain\Weather\Interfaces\TemperatureUnits;

class Fahrenheit implements TemperatureUnits
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'fahrenheit';
    }

    /**
     * @inheritDoc
     */
    public function getSymbol(): string
    {
        return 'F';
    }
}
