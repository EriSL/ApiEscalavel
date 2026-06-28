<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Services\Auth\AuthService;
use CodeIgniter\Api\ResponseTrait;
class AuthController extends BaseController
{
    use ResponseTrait;
    protected object $authService;
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        $credentials = [
            'email' => $this->request->getJson()->email,
            'password' => $this->request->getJson()->password
        ];

        $user = $this->authService->login($credentials);

        return $this->respond(
            $user,
            200,
            'Login realizado com sucesso.'
        );


    }

    public function register()
    {
        $data = [
            'email' => $this->request->getJson()->email,
            'password' => $this->request->getJson()->password
        ];

        $user = $this->authService->register($data);

        return $this->respond(
            $user,
            201,
            'Registro realizado com sucesso.'
        );

    }

    public function logout()
    {
        $this->authService->logout();

        return $this->respond(
            ['message' => 'Logout realizado com sucesso.'],
            200
        ); 

    }
}
