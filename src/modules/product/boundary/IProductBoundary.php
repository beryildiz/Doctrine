<?php

namespace App\modules\product\boundary;

use App\modules\product\entity\Product;

interface IProductBoundary
{
    public function renderProduct($productId);

    public function renderAllProducts();

}
