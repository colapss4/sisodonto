<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestUserClinicSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'users_id' => 1,
                'clinics_id' => 1,
                'user_roles_id' => 1,
                'active' => true
            ],
            [
                'users_id' => 1,
                'clinics_id' => 2,
                'user_roles_id' => 2,
                'active' => true
            ],
            [
                'users_id' => 1,
                'clinics_id' => 3,
                'user_roles_id' => 3,
                'active' => true
            ]
        ];

        foreach ($data as $values) $this->db->table('user_clinic')->insert($values);
    }
}
