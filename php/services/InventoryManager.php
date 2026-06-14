<?php

namespace services;

use entity\Product;

class InventoryManager
{
    public function verifyStock(Product $product, int $quantity): void
    {
        if ($product->getStock() < $quantity) {
            throw new \RuntimeException(
                "Stock insuffisant pour {$product->getName()}"
            );
        }
    }

    public function deductStock(Product $product, int $quantity): void
    {
        $product->decreaseStock($quantity);
    }
}