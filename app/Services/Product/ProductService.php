<?php

namespace App\Services\Product;


use App\Models\Product;
use App\Services\BaseService;
use App\Services\Traits\FileHandler;

class ProductService extends BaseService
{
    use FileHandler;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function store(): ProductService
    {
        $this->uploadFile();

        $this->model = parent::save($this->getAttrs());

        return $this;
    }

    public function uploadFile()
    {
        $this->setAttr(
            'image',
            $this->storeFile($this->getAttr('image'))
        );
    }
}
