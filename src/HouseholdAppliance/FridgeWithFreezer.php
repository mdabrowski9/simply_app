<?php

declare(strict_types=1);

namespace App\HouseholdAppliance;

/**
 * Class FridgeWithFreezer
 * @package App\HouseholdAppliance
 */
class FridgeWithFreezer extends Fridge
{
    /**
     * @var float $freezerTemperature
     */
    private $freezerTemperature;

    /**
     * @return float
     */
    public function getFreezerTemperature(): float
    {
        return $this->freezerTemperature;
    }

    /**
     * @param float $freezerTemperature
     */
    public function setFreezerTemperature(float $freezerTemperature): void
    {
        $this->freezerTemperature = $freezerTemperature;
    }

}