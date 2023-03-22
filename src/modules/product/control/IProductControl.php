<?php

namespace App\modules\product\control;

use App\modules\product\entity\Product;

interface IProductControl
{
    public function createProduct(string $name, float $price): Product;

    public function getProduct(int $id): ?Product;

    public function getAllProducts(): array;

    public function updateProduct(int $id, string $name, float $price): bool;

    public function deleteProduct(int $id): bool;
}
