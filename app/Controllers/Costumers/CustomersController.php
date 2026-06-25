<?php

namespace App\Controllers\Costumers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\Costumers\CostumersServices;

class CustomersController extends BaseController
{
    private $customersService;

    public function __construct()
    {
        $this->customersService = new CostumersServices();
    }

    public function index()
    {
        $costumers = $this->customersService->getAllCostumers();
        
        return $this->response->setJSON($costumers);
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
