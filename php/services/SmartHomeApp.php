<?php

namespace services;

use controllers\LightController;
use controllers\ThermostatController;
use controllers\SecurityController;
use devices\IDevice;

class SmartHomeApp
{
    public function __construct(
        private LightController $lightController,
        private ThermostatController $thermostatController,
        private SecurityController $securityController,
        private array $devices
    ) {}

    public function turnOnLight(string $room): void
    {
        $this->lightController->turnOnLight($room);
    }

    public function setTemperature(float $temp): void
    {
        $this->thermostatController->setTemperature($temp);
    }

    public function lockDoors(): void
    {
        $this->securityController->lockDoors();
    }

    public function turnOffAll(): void
    {
        echo "Extinction globale..." . PHP_EOL;

        foreach ($this->devices as $device) {
            if ($device instanceof IDevice) {
                $device->turnOff();
            }
        }
    }
}