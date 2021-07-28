<?php


namespace App\Services\Product;


use App\Models\Product;
use App\Services\BaseService;

class ProductService extends BaseService
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function store(): ProductService
    {
        $this->model = parent::save($this->getAttrs());

        return $this;
    }
}
