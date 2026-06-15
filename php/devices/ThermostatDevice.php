<?php

namespace devices;

class ThermostatDevice implements IDevice
{
    public function turnOff(): void
    {
        echo "Thermostat en mode eco." . PHP_EOL;
    }
}