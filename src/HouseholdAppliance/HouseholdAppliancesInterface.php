<?php

declare(strict_types=1);

namespace App\HouseholdAppliance;

/**
 * Interface HouseholdAppliancesInterface
 * @package App\HouseholdAppliance
 */
interface HouseholdAppliancesInterface
{
    /**
     * @return int
     */
    public function getCapacity(): int;

    /**
     * @return string
     */
    public function getColour(): string ;
}