<?php

declare(strict_types=1);

require_once 'HouseholdAppliancesInterface.php';
require_once 'Exceptions/GivenObjectExistException.php';
require_once 'Exceptions/GivenObjectNotExistException.php';
require_once 'ProductCollection.php';

class Fridge implements HouseholdAppliancesInterface
{
    /**
     * @var ProductCollection $products
     */
    private $products;

    /**
     * @var string $colour
     */
    protected $colour;

    /**
     * @var float $temperature
     */
    protected $temperature;

    /**
     * @var int $capacity
     */
    protected $capacity;

    /**
     * Fridge constructor.
     * @param float $temperature
     * @param int $capacity
     * @param string $colour
     */
    public function __construct(float $temperature, int $capacity, string $colour)
    {
        $this->products = new ProductCollection();
        $this->temperature = $temperature;
        $this->capacity = $capacity;
        $this->colour = $colour;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @param Product $product
     * @throws GivenObjectNotExistException
     * @throws KeyHasUseException
     */
    public function addProduct(Product $product): void
    {
        if ($this->isEnoughSpaceToAddProduct($product) < 0) {
            throw new GivenObjectNotExistException('This object already exists in ' . self::class);
        }
            $this->products->addItem($product, $product->getProductName());
    }

    /**
     * @param Product $product
     * @throws ObjectNotExistException
     */
    public function removeProduct(Product $product): void
    {
        $this->products->deleteItem($product->getProductName());
    }

    /**
     * @return array
     */
    public function getListOfProductsName(): array
    {
        $listOfProductsName =[];
        foreach ($this->products->getItemList() as $product) {
            \array_push($listOfProductsName, $product->getProductName());
        }
        return $listOfProductsName;
    }

    /**
     * @return bool
     */
    public function isFull(): bool
    {
        $spaceInUse = $this->spaceInUse();

        return ($spaceInUse >= $this->capacity);
    }

    /**
     * @param Product $product
     * @return int
     */
    private function isEnoughSpaceToAddProduct(Product $product)
    {
        $spaceInUse = $this->spaceInUse();
        $freeSpace = $this->capacity - $spaceInUse;
        return ($freeSpace <=> $product->getProductCapacity());
    }

    private function spaceInUse(): int
    {
        $spaceInUse = 0;
        foreach ($this->products->getItemList() as $product) {
            $spaceInUse += $product->getProductCapacity();
        }
        return $spaceInUse;
    }
}