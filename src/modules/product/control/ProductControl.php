<?php

namespace App\modules\product\control;


use App\modules\product\entity\Product;
use App\modules\product\entity\ProductGatewayInterface;

class ProductControl implements ProductControlInterface
{
    private ProductGatewayInterface $productGateway;

    public function __construct(ProductGatewayInterface $productGateway)
    {
        $this->productGateway = $productGateway;
    }

    public function createProduct(string $name, float $price): Product
    {
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);

        $this->productGateway->save($product);

        return $product;
    }

    public function getProduct(int $id): ?Product
    {
        return $this->productGateway->find($id);
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
}
