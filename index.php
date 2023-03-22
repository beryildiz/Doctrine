<?php


use App\factories\EntityManagerFactory;
use App\modules\product\boundary\ProductBoundary;
use App\modules\product\control\ProductControl;
use App\modules\product\gateway\ProductGateway;

require_once __DIR__ . "/vendor/autoload.php";

// Erstelle den EntityManager für das Product-Modul
$productEntityManager = EntityManagerFactory::createEntityManager(__DIR__ . "/src/modules/product/entity");

// Erstelle den ProductGateway für das Product-Modul
$productGateway = new ProductGateway($productEntityManager);
$productControl = new ProductControl($productGateway);

$productControl->renderAllProducts();


/*
$product = new Product();
$product->setName('Sample product');
$product->setPrice(9.99);
$productGateway->save($product);

$monkey = new Product();
$monkey->setName('Monkey product');
$monkey->setPrice(9.99);
$productGateway->save($monkey);

$foundProduct = $productGateway->findAll();
foreach ($foundProduct as $col) {
    echo $col->getName() . "<br>";
}
*/



