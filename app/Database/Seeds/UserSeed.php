<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeed extends Seeder
{
    public function run()
    {
        #@test Usuário de teste, utilizado apenas para testes de desenvolvimento, não deve ser utilizado em produção.
        $users = auth()->getProvider();

        $user = $users->createNewUser([
            'username'  => 'admin',
            'email'     => 'master@mail.com',
            'password'  => 'Mstr@123',
            'active'    => true
        ]);

        $userId = $users->insert($user);

        $user = $users->findById($userId);

        $user->addGroup('admin');

    }
}
