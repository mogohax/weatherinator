<?php

namespace App\Domain\Weather\Models\Speed;

use App\Domain\Weather\Interfaces\SpeedUnits;

class MetersPerSecond implements SpeedUnits
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'meters per second';
    }

    /**
     * @inheritDoc
     */
    public function getSymbol(): string
    {
        return 'm/s';
    }
}
