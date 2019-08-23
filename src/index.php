<?php

require_once 'Fridge.php';
require_once 'Product.php';

$myFridge = new Fridge(5.5, 10000, 'black');
$product1 = new Product('milk', 400);
$product2 = new Product('vegetables', 2500);
$product3 = new Product('water', 500);
$product4 = new Product('chocolate', 100);
$product5 = new Product('cheese', 200);
$product6 = new Product('extender', 6300);
$product6 = new Product('stone', 7100);



try{
    $myFridge->addProduct($product1);
    $myFridge->addProduct($product2);
    $myFridge->addProduct($product6);
    $myFridge->removeProduct($product1);

}
catch(GivenObjectExistException|GivenObjectNotExistException $exception)
{
    print_r($exception->getMessage());
}
print_r($myFridge->isFull());
print_r($myFridge->getListOfProductsName());

print_r('Koniec');