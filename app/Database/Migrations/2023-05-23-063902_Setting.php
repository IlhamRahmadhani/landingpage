<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Setting extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'key' => [
                'type'           => 'VARCHAR',
                'constraint' => '255',
            ],
            'value' => [
                'type'       => 'TEXT',
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '31',
                'default' => 'string'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('key', true);
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');

    }
}
