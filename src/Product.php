<?php

declare(strict_types=1);

class Product
{
    /**
     * @var string $productName
     */
    private $productName;

    /**
     * @var int $capacity
     */
    private $capacity;

    public function __construct(string $productName, int $capacity)
    {
        $this->productName = $productName;
        $this->capacity = $capacity;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getProductCapacity(): int
    {
        return $this->capacity;
    }
}