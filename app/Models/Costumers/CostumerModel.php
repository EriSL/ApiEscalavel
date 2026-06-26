<?php

namespace App\Models\Costumers;

use CodeIgniter\Model;

class CostumerModel extends Model
{
    protected $table            = 'costumers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'external_id',
        'name',
        'email',
        'phone',
        'profile_image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [
        #@todo Otimizar a geração de UUID 'uuidRegister'
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function uuidRegister()
    {
        helper('get_uuid');

        if (empty($data['data']['external_id'])) {
            $data['data']['external_id'] = get_uuid();
        }

        return $data;
    }

    public function fake(\Faker\Generator &$faker): array
    {
        return [
            'external_id'       => $faker->uuid(),
            'name'              => $faker->words( 4, true),
            'email'             => $faker->email(),
            'phone'             => $faker->phoneNumber(),
            'profile_image'    => $faker->imageUrl(),
        ];
    }
}
