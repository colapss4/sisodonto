<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class CreateTableUsers extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
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
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'unique' => true,
                'null' => true
            ],
            'cro' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true
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

        $this->forge->createTable('users');

        if (ENVIRONMENT != 'production') {
            $seeder = Database::seeder();
            $seeder->call('TestUserSeeder');
        }
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
