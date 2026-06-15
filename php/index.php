<?php

require_once __DIR__ . "/controllers/LightController.php";
require_once __DIR__ . "/controllers/ThermostatController.php";
require_once __DIR__ . "/controllers/SecurityController.php";

require_once __DIR__ . "/devices/IDevice.php";
require_once __DIR__ . "/devices/LightDevice.php";
require_once __DIR__ . "/devices/ThermostatDevice.php";
require_once __DIR__ . "/devices/SecurityDevice.php";

require_once __DIR__ . "/services/SmartHomeApp.php";

use controllers\LightController;
use controllers\ThermostatController;
use controllers\SecurityController;

use devices\IDevice;
use devices\LightDevice;
use devices\ThermostatDevice;
use devices\SecurityDevice;

use services\SmartHomeApp;

// Controleurs
$lightController = new LightController();
$thermostatController = new ThermostatController();
$securityController = new SecurityController();

// Equipements
$devices = [
    new LightDevice(),
    new ThermostatDevice(),
    new SecurityDevice()
];

// Application
$smartHomeApp = new SmartHomeApp(
    $lightController,
    $thermostatController,
    $securityController,
    $devices
);

// Tests
$smartHomeApp->turnOnLight("Salon");
$smartHomeApp->setTemperature(22.5);
$smartHomeApp->lockDoors();

echo PHP_EOL;

$smartHomeApp->turnOffAll();