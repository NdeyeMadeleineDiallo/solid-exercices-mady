<?php

namespace strategy;

class VipDiscountStrategy implements IDiscountStrategy
{
    public function applyDiscount(float $total): float
    {
        return $total * 0.80;
    }
}