<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Usuário de Teste',
            'email' => 'user@sisodonto.mail',
            'phone_number' => '92987654321',
            'password' => md5('12345678'),
            'cpf' => '00000000000',
            'active' => true
        ];

        $this->db->table('users')->insert($data);
    }
}
