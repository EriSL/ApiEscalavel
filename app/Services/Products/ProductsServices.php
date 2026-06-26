<?php

namespace App\Services\Products;

use App\Models\Product\ProductModel;

class ProductsServices
{
    private object $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function getAllProducts()
    {
        return $this->productModel->findAll();
    }

    public function getProductById(int $id)
    {
        return $this->productModel->find($id);
    }

    public function createProduct(Array $data)
    {
        return $this->productModel->insert($data);
    }

    public function updateProduct(int $id, Array $data)
    {
        return $this->productModel->update($data, ['id' => $id]);
    }

    public function deleteProduct(int $id)
    {
        return $this->productModel->delete(['id' => $id]);
    }
}