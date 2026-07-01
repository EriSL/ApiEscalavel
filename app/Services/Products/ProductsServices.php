<?php

namespace App\Services\Products;

use App\Models\Product\ProductModel;

class ProductsServices
{
    private object $productModel;

    private const PUBLIC_FIELDS = [
        'external_id',
        'name',
        'description',
        'price',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function getAllProducts()
    {
        //@fix Permitir que o usuário selecione o número de produtos por página, e a página que deseja acessar.
        $products = $this->productModel
            ->select(self::PUBLIC_FIELDS)
            ->paginate(50);

        return [
            'data'  => $products,
            'pager' => $this->productModel->pager,
        ];
    }

    public function getProductById(int $id)
    {
        return $this->productModel
            ->select(self::PUBLIC_FIELDS)
            ->find($id);
    }

    public function createProduct(Array $data)
    {
        return $this->productModel
            ->select(self::PUBLIC_FIELDS)
            ->insert($data);
    }

    public function updateProduct(int $id, Array $data)
    {
        return $this->productModel
            ->select(self::PUBLIC_FIELDS)
            ->update($data, ['id' => $id]);
    }

    public function deleteProduct(int $id)
    {
        return $this->productModel
            ->select(self::PUBLIC_FIELDS)
            ->delete(['id' => $id]);
    }
}