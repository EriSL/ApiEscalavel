<?php 

namespace App\Services\Costumers;
use App\Models\Costumers\CostumerModel;

class CostumerService
{
    #@todo Restantes (Envelopar Resposta, Validar Dados, Tratar Erros, Alterar external_id para costumerId, data no padrão ISO-8601, paginação, omitir deleted_at)
    private object $costumerModel;

    private const PUBLIC_FIELDS = [
        'external_id', 
        'name', 
        'email', 
        'phone', 
        'profile_image', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function __construct()
    {
        $this->costumerModel = new CostumerModel();
    }

    public function getAllCostumers()
    {
        return $this->costumerModel
            ->select(self::PUBLIC_FIELDS)
            ->findAll();
    }

    public function getCostumerById($external_id)
    {
        return $this->costumerModel
            ->select(self::PUBLIC_FIELDS)
            ->where('external_id', $external_id)
            ->first();
    }

    public function updateCostumer($external_id, $data)
    {
        return $this->costumerModel
            ->select(self::PUBLIC_FIELDS)
            ->where('external_id', $external_id)
            ->update($data);

    }

    public function createCostumer($data)
    {
        return $this->costumerModel->insert($data);
    }

    public function deleteCostumer($external_id)
    {
        return $this->costumerModel
            ->select(self::PUBLIC_FIELDS)
            ->where('external_id', $external_id)
            ->delete();
    }



}

