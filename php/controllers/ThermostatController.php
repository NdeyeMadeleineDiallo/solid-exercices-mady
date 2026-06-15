<?php

namespace controllers;

class ThermostatController
{
    public function setTemperature(float $temp): void
    {
        echo "Thermostat regle sur {$temp}°C" . PHP_EOL;
    }
}