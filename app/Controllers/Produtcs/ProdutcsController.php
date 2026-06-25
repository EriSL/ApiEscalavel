<?php

namespace App\Controllers\Produtcs;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\Products\ProductsServices;

class ProdutcsController extends BaseController
{
    private $productsService;

    public function __construct()
    {
        $this->productsService = new ProductsServices();
    }

    public function index()
    {
        return [
            'status' => ResponseInterface::HTTP_OK,
            'message' => 'Produtos listados com sucesso',
            'data' => $this->productsService->getAllProducts()
        ];
    }

    public function show($id)
    {
        //
    }


    public function store()
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
