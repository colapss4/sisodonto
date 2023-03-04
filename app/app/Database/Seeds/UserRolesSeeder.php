<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'description' => 'Proprietário',
                'slug' => 'owner'
            ],
            [
                'description' => 'Administrador',
                'slug' => 'admin'
            ],
            [
                'description' => 'Usuário',
                'slug' => 'user'
            ]
        ];

        foreach ($data as $values) $this->db->table('user_roles')->insert($values);
    }
}
