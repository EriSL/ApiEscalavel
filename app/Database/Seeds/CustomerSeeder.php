<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $fabricator = new Fabricator('App\Models\Costumers\CostumerModel');
        $fabricator->create(5000);
    }
}
