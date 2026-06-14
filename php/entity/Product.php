<?php

namespace entity;

class Product
{
    public function __construct(
        private string $name,
        private float $price,
        private int $stock
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function decreaseStock(int $quantity): void
    {
        if ($quantity <= 0) {
            throw new \InvalidArgumentException("La quantité doit être supérieure à 0");
        }

        if ($this->stock < $quantity) {
            throw new \RuntimeException("Stock insuffisant pour {$this->name}");
        }

        $this->stock -= $quantity;
    }
}