<?php

namespace App\modules\product\entity;

interface ProductGatewayInterface
{
    public function save(Product $product): void;

    public function delete(Product $product): void;

    public function find(int $id): ?Product;

    public function findAll(): array;
}
