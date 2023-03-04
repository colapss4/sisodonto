<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class CreateTableClinics extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'corporate_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'fantasy_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'responsible_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'cnpj' => [
                'type' => 'VARCHAR',
                'constraint' => 14,
                'unique' => true,
                'null' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 320,
                'unique' => true,
                'null' => false
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'unique' => true,
                'null' => false
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
                'null' => true
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
                'null' => true
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'address_number' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true
            ],
            'address_complement' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'address_district' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'address_city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'address_state' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'active' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ]
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('clinics');

        if (ENVIRONMENT != 'production') {
            $seeder = Database::seeder();
            $seeder->call('TestClinicSeeder');
        }
    }

    public function down()
    {
        $this->forge->dropTable('clinics');
    }
}
