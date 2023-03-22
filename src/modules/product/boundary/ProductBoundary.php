<?php

namespace App\modules\product\boundary;


use App\modules\product\control\ProductControl;

class ProductBoundary implements IProductBoundary
{
    private ProductControl $productControl;
    private ProductPresenter $productPresenter;

    public function __construct(ProductControl $productControl)
    {
        $this->productControl = $productControl;
        $this->productPresenter = new ProductPresenter();
    }


    public function renderProduct($productId)
    {
        $data = $this->productControl->getProduct($productId);
        $this->productPresenter->presentData($data);
    }

    public function renderAllProducts()
    {
        $data = $this->productControl->getAllProducts();
        $this->productPresenter->presentData($data);
    }
}
