<?php

namespace App\Domain\Weather\Models\Temperature;

use App\Domain\Weather\Interfaces\TemperatureUnits;

class Celsius implements TemperatureUnits
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'celsius';
    }

    /**
     * @inheritDoc
     */
    public function getSymbol(): string
    {
        return 'C';
    }
}
