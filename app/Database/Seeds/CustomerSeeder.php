<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $fabricator = new Fabricator('App\Models\Customer');
        $fabricator->create(50000);
    }
}
