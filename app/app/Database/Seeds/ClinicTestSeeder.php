<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClinicTestSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'corporate_name' => 'Clínica Dentinho',
                'cnpj' => '00000000000000',
                'email' => 'contato@dentinho.mail',
                'phone_number' => '92934534535',
                'active' => true
            ],
            [
                'corporate_name' => 'Consultório do Dr Dente de Sabre',
                'cnpj' => '11111111111111',
                'email' => 'contato@dentedesabre.mail',
                'phone_number' => '92934534534',
                'active' => true
            ],
            [
                'corporate_name' => 'Clínica Pague Menos e Leve Menos',
                'cnpj' => '22222222222222',
                'email' => 'contato@clinica.mail',
                'phone_number' => '92943545454',
                'active' => true
            ]
        ];

        foreach ($data as $values) $this->db->table('clinics')->insert($values);
    }
}
