<?php

namespace strategy;

class NoDiscountStrategy implements IDiscountStrategy
{
    public function applyDiscount(float $total): float
    {
        return $total;
    }
}