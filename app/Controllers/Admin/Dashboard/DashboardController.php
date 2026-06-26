<?php

namespace App\Controllers\Admin\Dashboard;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class DashboardController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $mock_data = [
            'total_costumers'        => 50,
            'abandoned_carts_7d'     => 5,
            'latest_orders_7d'       => 10,
            'total_products'         => 150,
            'total_orders'           => 75,
            'total_customers'        => 50,
            'total_revenue'          => 10000,
            'products_low_stock'     => 3,
        ];

        return $this->respond($mock_data);
    }
}
