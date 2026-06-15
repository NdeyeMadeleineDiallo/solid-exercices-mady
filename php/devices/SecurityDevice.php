<?php

namespace devices;

class SecurityDevice implements IDevice
{
    public function turnOff(): void
    {
        echo "Alarme ACTIVEE." . PHP_EOL;
    }
}