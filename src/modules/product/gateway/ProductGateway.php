<?php

namespace App\modules\product\gateway;

use App\modules\product\entity\Product;
use App\modules\product\entity\ProductGatewayInterface;
use Doctrine\ORM\EntityManager;

class ProductGateway implements ProductGatewayInterface
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Product $product): void
    {
        try {
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(Product $product): void
    {
        try {
            $this->entityManager->remove($product);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function find(int $id): ?Product
    {
        return $this->entityManager->getRepository(Product::class)->find($id);
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Product::class)->findAll();
    }
}
