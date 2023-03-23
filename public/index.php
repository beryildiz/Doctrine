<?php


use App\container\Container;
use App\modules\product\control\ProductControl;
use App\router\Router;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../security/sanitize.php";

define('APPLICATION_PATH', substr(realpath(dirname(__FILE__)), 0, -6));


$container = new Container();
$router = new Router($container);


// Wie bekommt man die {id} von der url rein.
if (isset($_SERVER['PATH_INFO'])) {
    $router->addRoute("/products", ProductControl::class, "index", "product");
    $router->addRoute("/products/{id}", ProductControl::class, "index", "create");
    $router->addRoute("/products/create", ProductControl::class, "index", "create");
    $router->dispatch($_SERVER['PATH_INFO']);
}









/*
// Erstelle den EntityManager für das Product-Modul
$productEntityManager = EntityManagerFactory::createEntityManager(__DIR__ . "/../src/modules/product/entity");

// Erstelle den ProductGateway für das Product-Modul
$productGateway = new ProductGateway($productEntityManager);
$productControl = new ProductControl($productGateway);
$productControl->renderAllProducts();
*/
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



