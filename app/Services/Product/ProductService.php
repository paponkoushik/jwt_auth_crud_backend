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
        if ($this->getAttr('image')) {
            $this->uploadFile();
        }

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

    public function update(): ProductService
    {
        if ($this->getAttr('image')) $this->uploadFile();

        $this->model->fill($this->getAttrs())->save();

        return $this;
    }
}
