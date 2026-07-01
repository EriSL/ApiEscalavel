<?php

namespace App\Controllers\Produtcs;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Services\Products\ProductsServices;

class ProdutcsController extends BaseController
{
    private $productsService;

    use ResponseTrait;

    public function __construct()
    {
        $this->productsService = new ProductsServices();
    }

    public function index(): Object
    {
        $products = $this->productsService->getAllProducts();

        if(empty($products)) {
            return $this->respond(
                'Nenhum Produto Encontrado',
                204,
            );
        }
        
        return $this->respond([
            'data' => $products['data'],
            'pagination' => $products['pager']->getDetails(),
        ]);
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
