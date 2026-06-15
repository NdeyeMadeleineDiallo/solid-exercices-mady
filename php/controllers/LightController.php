<?php

namespace controllers;

class LightController
{
    public function turnOnLight(string $room): void
    {
        echo "Lumiere allumee dans : {$room}" . PHP_EOL;
    }
}