<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class CreateTableUserRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100
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

        $this->forge->createTable('user_roles');

        $seeder = Database::seeder();
        $seeder->call('UserRolesSeeder');
    }

    public function down()
    {
        $this->forge->dropTable('user_roles');
    }
}
