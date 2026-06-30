<?php

namespace App\Controllers\Util;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class HealthController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return $this->respond([
            'code' => 418,
            'message' => "I'm a teapot",
            'status' => ':)'
        ]);
    }
}
