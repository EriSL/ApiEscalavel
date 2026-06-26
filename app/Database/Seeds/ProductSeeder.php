<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
class ProductSeeder extends Seeder
{
    public function run()
    {
        $fabricator = new Fabricator('App\Models\Product\ProductModel');
        $fabricator->create(10000);
    }
}
