<?php

namespace App\Domain\Weather\Models\Temperature;

use App\Domain\Weather\Interfaces\TemperatureUnits;

class Kelvin implements TemperatureUnits
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'kelvin';
    }

    /**
     * @inheritDoc
     */
    public function getSymbol(): string
    {
        return 'K';
    }
}
