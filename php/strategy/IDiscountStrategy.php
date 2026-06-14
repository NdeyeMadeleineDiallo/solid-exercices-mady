<?php

namespace strategy;

interface IDiscountStrategy
{
    public function applyDiscount(float $total): float;
}