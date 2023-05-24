<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipePerkuliahan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'  => 'INT',
                'auto_increment' => true,
            ],
            'tipe' => [
                'type'  => 'VARCHAR',
                'constraint'    => '255',
                'null'  => true,
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('tipe_perkuliahan');
    }

    public function down()
    {
        $this->forge->dropTable('tipe_perkuliahan');
    }
}
