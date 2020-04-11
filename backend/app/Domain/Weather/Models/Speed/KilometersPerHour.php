<?php

namespace App\Domain\Weather\Models\Speed;

use App\Domain\Weather\Interfaces\SpeedUnits;

class KilometersPerHour implements SpeedUnits
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'kilometers per hour';
    }

    /**
     * @inheritDoc
     */
    public function getSymbol(): string
    {
        return 'km/h';
    }
}
