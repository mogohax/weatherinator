<?php


namespace App\Domain\Weather\Interfaces;


interface TemperatureUnits
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
