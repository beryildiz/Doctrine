<?php

namespace App\modules\product\boundary;

interface ProductBoundaryInterface
{
    public function createProduct(string $name, float $price): array;

    public function getProduct(int $id): ?array;

    public function updateProduct(int $id, string $name, float $price): bool;

    public function deleteProduct(int $id): bool;

}
