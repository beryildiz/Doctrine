<?php

namespace App\modules\product\boundary;


class ProductBoundary implements IProductBoundary
{
    private ProductPresenter $productPresenter;

    public function __construct()
    {
        $this->productPresenter = new ProductPresenter();
    }


    public function render($data)
    {
        $this->productPresenter->presentData($data);
    }
}
