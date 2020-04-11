<?php


namespace App\Domain\Weather\Interfaces;


interface SpeedUnits
{
    /**
     * Get Unit name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get Unit symbol
     *
     * @return string
     */
    public function getSymbol(): string;
}
