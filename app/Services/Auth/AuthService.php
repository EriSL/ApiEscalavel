<?php

namespace App\Services\Auth;

use App\Models\UserModel;
class AuthService
{
    private object $auth;
    public function __construct(){
        $this->auth = auth();
    }

    public function login(array $credentials)
    {
        if(!isset($credentials['email']) || !isset($credentials['password']))
        {
            return ['error' => 'Credenciais não fornecidas.'];
        }

        $auth = $this->auth->getAuthenticator();

        $result = $auth->attempt($credentials);

        if(!$result->isOK())
        {
            return ['error' => 'Credenciais inválidas.'];
        }

        $user = auth()->user();

        $token = $user->generateAccessToken('API');

        return [
            'user' => $user,
            'token' => $token
        ];



    }

    public function register($data)
    {
        #@todo: Implementar controle de permissões e refatoar para forma mais eficiente !
        if(!isset($data['email']) || !isset($data['password']))
        {
            return ['error' => 'Dados de registro incompletos.'];
        }

        $userModel = auth()->getProvider();

        $user = $userModel->createNewUser([
            'username'  => $data['email'],
            'email'     => $data['email'],
            'password'  => $data['password'],
            'active'    => true
        ]);

        $userId = $userModel->insert($user);

        if(!$userId)
        {
            return ['error' => 'Falha ao registrar o usuário.'];
        }

        return $user;
    }

    public function logout()
    {
        $user = auth()->user();

        if($user)
        {
            $user->auth->revokeAccessTokens();
            return ['message' => 'Logout realizado com sucesso.'];
        }

        return ['error' => 'Usuário não autenticado.'];
    }
}