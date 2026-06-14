<?php

namespace strategy;

class BlackFridayDiscountStrategy implements IDiscountStrategy
{
    public function applyDiscount(float $total): float
    {
        return $total * 0.50;
    }
}