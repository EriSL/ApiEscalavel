<?php

namespace App\Models\Product;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'external_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'external_id',
        'name',
        'description',
        'price',
        'promotional_price',
        'stock_quantity',
        'image_url',
        'visible',
        'created_at',
        'updated_at',
        'deleted_at'
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
        //@todo Implementar a função de gerar uuid para o registro e não depender do dev
        //'uuidRegister'
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function fake(\Faker\Generator &$faker): array
    {
        return [
            'external_id'       => $faker->uuid(),
            'name'              => $faker->words( 4, true),
            'description'       => $faker->sentence(),
            'price'             => $faker->randomFloat(2, 1, 1000),
            'promotional_price' => $faker->randomFloat(2, 1, 1000),
            'stock_quantity'    => $faker->numberBetween(1, 100),
            'image_url'         => $faker->imageUrl(),
            'visible'           => $faker->boolean(),
        ];
    }

    protected function uuidRegister() 
    {
        helper('get_uuid');
        
        if (empty($data['data']['external_id'])) {
            $data['data']['external_id'] = get_uuid();
        }

        return $data;
    }

}
