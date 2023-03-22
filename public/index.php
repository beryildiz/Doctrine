<?php


use App\container\Container;
use App\modules\product\control\ProductControl;
use App\router\Router;

require_once __DIR__ . "/../vendor/autoload.php";

$pathInfo = $_SERVER["PATH_INFO"];

$container = new Container();
$router = new Router($container);


// Todo: Path params fetchen
if (isset($pathInfo)) {
    $link = explode("/", $pathInfo);
    // $pathParam = $link[2];


    $router->addRoute("/products", ProductControl::class, "getAllProducts", null);
    // $router->addRoute("/products/{$pathParam}", ProductControl::class, "getProductById", $pathParam);


    $router->dispatch($pathInfo);
} else {
    $router->dispatch("index.php");
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



