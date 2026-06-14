<?php

require_once __DIR__ . "/entity/Product.php";

require_once __DIR__ . "/services/InventoryManager.php";
require_once __DIR__ . "/services/InvoiceGenerator.php";
require_once __DIR__ . "/services/NotificationService.php";
require_once __DIR__ . "/services/OrderManager.php";

require_once __DIR__ . "/strategy/IDiscountStrategy.php";
require_once __DIR__ . "/strategy/VipDiscountStrategy.php";
require_once __DIR__ . "/strategy/BlackFridayDiscountStrategy.php";
require_once __DIR__ . "/strategy/NoDiscountStrategy.php";

use entity\Product;
use services\InventoryManager;
use services\InvoiceGenerator;
use services\NotificationService;
use services\OrderManager;
use strategy\IDiscountStrategy;
use strategy\VipDiscountStrategy;
use strategy\BlackFridayDiscountStrategy;
use strategy\NoDiscountStrategy;

$product = new Product("Ordinateur HP", 300000, 10);

$inventoryManager = new InventoryManager();
$invoiceGenerator = new InvoiceGenerator();
$notificationService = new NotificationService();

$orderManager = new OrderManager(
    $inventoryManager,
    $invoiceGenerator,
    $notificationService
);

$discountStrategy = new VipDiscountStrategy();

try {
    $orderManager->processOrder(
        $product,
        2,
        $discountStrategy,
        "mady@gmail.com"
    );

    echo "Stock restant : " . $product->getStock() . PHP_EOL;

} catch (RuntimeException | InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
}