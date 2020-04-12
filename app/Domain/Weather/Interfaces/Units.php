<?php

namespace App\Domain\Weather\Interfaces;

interface Units
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
