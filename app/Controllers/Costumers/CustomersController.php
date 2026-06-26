<?php

namespace App\Controllers\Costumers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Services\Costumers\CostumerService;


class CustomersController extends BaseController
{
    private $customersService;
    use ResponseTrait;

    public function __construct()
    {
        $this->customersService = new CostumerService();
    }

    public function index()
    {
        $costumers = $this->customersService->getAllCostumers();
        
        return $this->respond(
            $costumers, 
            200, 
            get_uuid()
        );
    }

    public function show($id)
    {
        $costumer = $this->customersService->getCostumerById($id);

        if (!$costumer) {
            return $this->failNotFound('Costumer not found');
        }

        return $this->respond(
            $costumer, 
            200, 
            get_uuid()
        );
    }


    public function store()
    {
        $data = $this->request->getJSON(true);

        $costumer = $this->customersService->createCostumer($data);

        return $this->respondCreated(
            $costumer, 
            'Costumer created successfully',
        );
        
    }

    public function update($id)
    {
        $data = $this->request->getJSON(true);

        $costumer = $this->customersService->updateCostumer($id, $data);

        if (!$costumer) {
            return $this->failNotFound('Costumer not found');
        }

        return $this->respond(
            $costumer, 
            200, 
            'Costumer updated successfully',
        );
    }

    public function destroy($id)
    {
        $deleted = $this->customersService->deleteCostumer($id);

        if (!$deleted) {
            return $this->failNotFound('Costumer not found');
        }

        return $this->respondDeleted(
            null, 
            'Costumer deleted successfully',
        );
    }


}
