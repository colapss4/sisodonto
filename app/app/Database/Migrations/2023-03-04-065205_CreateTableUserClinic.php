<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class CreateTableUserClinic extends Migration
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
            'users_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'clinics_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'user_roles_id' => [
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => true
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

        $this->forge->addKey(['users_id', 'clinics_id', 'user_roles_id'], false, true);

        $this->forge->addForeignKey('users_id', 'users', 'id');
        $this->forge->addForeignKey('clinics_id', 'clinics', 'id');
        $this->forge->addForeignKey('user_roles_id', 'user_roles', 'id');

        $this->forge->createTable('user_clinic');

        if (ENVIRONMENT != 'production') {
            $seeder = Database::seeder();
            $seeder->call('UserClinicTestSeeder');
        }
    }

    public function down()
    {
        $this->forge->dropTable('user_clinic');
    }
}
