<?php

namespace App\Controllers\Util;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class HealthController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return $this->respond(
            "I'm a teapot",    
            418,
            ':)',

        );
    }
}
