<?php 

namespace App\Services\Costumers;
use App\Models\Costumers\CostumerModel;
class CostumersServices
{
    private object $costumerModel;

    public function __construct()
    {
        $this->costumerModel = new CostumerModel();
    }

    public function getAllCostumers()
    {
        return $this->costumerModel->findAll();
    }

    public function getCostumerById($id)
    {
        return $this->costumerModel->find($id);
    }

    public function createCostumer($data)
    {
        return $this->costumerModel->insert($data);
    }

    public function updateCostumer($id, $data)
    {
        return $this->costumerModel->update($data, $id);
    }

    public function deleteCostumer($id)
    {
        return $this->costumerModel->delete($id);
    }
}

