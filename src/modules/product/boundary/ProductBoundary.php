<?php

namespace App\modules\product\boundary;


use App\modules\product\control\ProductControl;

class ProductBoundary implements ProductBoundaryInterface
{
    private ProductControl $productControl;

    public function __construct(ProductControl $productControl)
    {
        $this->productControl = $productControl;
    }

    public function createProduct(string $name, float $price): array
    {
        $product = $this->productControl->createProduct($name, $price);

        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ];
    }

    public function getProduct(int $id): ?array
    {
        $product = $this->productControl->getProduct($id);

        if ($product) {
            return [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
            ];
        } else {
            return null;
        }
    }

    public function updateProduct(int $id, string $name, float $price): bool
    {
        return $this->productControl->updateProduct($id, $name, $price);
    }

    public function deleteProduct(int $id): bool
    {
        return $this->productControl->deleteProduct($id);
    }
}
