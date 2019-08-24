<?php

declare(strict_types=1);

namespace App\Product;

require_once (__DIR__ . '/../Exceptions/KeyHasUseException.php');
require_once (__DIR__ . '/../Exceptions/KeyInvalidException.php');
require_once (__DIR__ . '/../Exceptions/ObjectNotExistException.php');
require_once ('Product.php');

use App\Exceptions\KeyHasUseException;
use App\Exceptions\KeyInvalidException;
use App\Exceptions\ObjectNotExistException;

class ProductCollection
{
    /**
     * @var array $items
     */
    private $items = [];

    public function addItem(Product $object, $key){
        if (isset($this->items[$key])){
            throw  new KeyHasUseException("Key $key already in use.");
        }
        else{
            $this->items[$key] = $object;
        }
    }

    public function deleteItem($key)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
        else {
            throw new ObjectNotExistException("The specified object does not exist in the collection");
        }
    }

    public function getItem($key): Product
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
        else {
            throw new KeyInvalidException("Invalid key $key.");
        }
    }

    public function getItemList(): array
    {
        return $this->items;
    }
}