<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Periode extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'tahun_ajaran' => [
                'type'  => 'VARCHAR',
                'constraint'    => '10',
            ],
            'active' => [
                'type'  => 'TINYINT',
                'constraint'  => '1',
                'default' => 0,
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
        $this->forge->createTable('periode');
    }

    public function down()
    {
        $this->forge->dropTable('periode');
    }
}
