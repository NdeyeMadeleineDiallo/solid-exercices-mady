<?php

namespace devices;

class LightDevice implements IDevice
{
    public function turnOff(): void
    {
        echo "Lumieres eteintes." . PHP_EOL;
    }
}