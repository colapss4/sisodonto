<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

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
                'constraint' => 128,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 256,
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
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['M', 'F'],
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

        $this->forge->addKey('id',true);

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
