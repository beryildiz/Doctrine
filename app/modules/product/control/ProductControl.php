<?php

namespace App\modules\product\control;

use App\modules\product\boundary\IProductBoundary;
use App\modules\product\boundary\ProductBoundary;
use App\modules\product\entity\Product;
use App\modules\product\entity\IProductGateway;

class ProductControl implements IProductControl
{
    private IProductGateway $productGateway;
    private IProductBoundary $productBoundary;

    public function __construct(IProductGateway $productGateway)
    {
        $this->productGateway = $productGateway;
        $this->productBoundary = new ProductBoundary($this);
    }

    public function createProduct(string $name, float $price): Product
    {
        $product = new Product($name, $price);
        $this->productGateway->save($product);

        return $product;
    }

    public function getProductById(int $id): ?Product
    {

        $data = $this->productGateway->find($id);

        $this->productBoundary->render($data);
        return $data;
    }

    public function getAllProducts(): array
    {
        $data = $this->productGateway->findAll();
        $this->productBoundary->render($data);

        return $data;
    }

    public function updateProduct(int $id, string $name, float $price): bool
    {
        $product = $this->productGateway->find($id);

        if (!$product) {
            return false;
        }

        $product->setName($name);
        $product->setPrice($price);

        $this->productGateway->save($product);

        return true;
    }

    public function deleteProduct(int $id): bool
    {
        $product = $this->productGateway->find($id);

        if (!$product) {
            return false;
        }

        $this->productGateway->delete($product);

        return true;
    }


    public function renderProduct($productId)
    {
        $this->productBoundary->renderProduct($productId);
    }

    public function renderAllProducts()
    {
        $this->productBoundary->renderAllProducts();
    }


}
