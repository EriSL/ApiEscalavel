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

    public function getAllCostumers(int $page = 1, int $perPage = 10)
    {
        if($perPage > 100) {
            return [
                'error' => 'A quantidade por página não pode ser maior que 100',
                'code' => 400
            ];
        }

        return $this->costumerModel
            ->select(self::PUBLIC_FIELDS)
            ->paginate($page, $perPage);
    }

    public function getCostumerById($external_id)
    {
        return $this->costumerModel
            ->select(self::PUBLIC_FIELDS)
            ->where('external_id', $external_id)
            ->paginate();
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

