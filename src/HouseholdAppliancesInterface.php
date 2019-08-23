<?php

declare(strict_types=1);

interface HouseholdAppliancesInterface
{
    /**
     * @return float
     */
    public function getTemperature(): float ;

    /**
     * @return int
     */
    public function getCapacity(): int;

    /**
     * @return string
     */
    public function getColour(): string ;
}