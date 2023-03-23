<?php

namespace App\modules\product\control;

use App\modules\product\entity\IProductGateway;
use App\modules\product\entity\Product;
use App\shared\Controller;
use App\shared\View;

class ProductControl extends Controller implements IProductControl
{
    private IProductGateway $productGateway;

    public function __construct(IProductGateway $productGateway)
    {
        $this->productGateway = $productGateway;
    }

    public function createProduct(string $name, float $price): bool
    {
        $product = new Product($name, $price);
        $this->productGateway->save($product);

        return true;
    }

    public function getProductById(int $id): Product
    {
        return $this->productGateway->find($id);
    }

    public function getAllProducts(): array
    {
        return $this->productGateway->findAll();
    }

    public function updateProduct(int $id, string $name, float $price): bool
    {
        $product = $this->productGateway->find($id);

        if (isset($product)) {
            $product->setName($name);
            $product->setPrice($price);
            $this->productGateway->save($product);

            return true;
        }
        return false;
    }

    public function deleteProduct(int $id): bool
    {
        $product = $this->productGateway->find($id);
        if (isset($product)) {
            $this->productGateway->delete($product);

            return true;
        }

        return false;
    }


    public function index(string $view)
    {
        $params = $this->getAllProducts();

        View::render("product", $view, $params, $this);
    }

}
