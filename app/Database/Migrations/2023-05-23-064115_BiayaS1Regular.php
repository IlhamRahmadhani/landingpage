<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BiayaS1Regular extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_jurusan' => [
                'type'  => 'VARCHAR',
                'constraint'    => '31',
            ],
            'biaya_gemilang' => [
                'type'  => 'BIGINT',
                'default'  => 0,
            ],
            'biaya_per_semester' => [
                'type'  => 'BIGINT',
                'default'  => 0,
            ],
            'total_biaya_4_tahun' => [
                'type'  => 'BIGINT',
                'default'  => 0,
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
        $this->forge->addKey('id_jurusan', false);
        $this->forge->createTable('biaya_s1_regular');
    }

    public function down()
    {
        $this->forge->dropTable('biaya_s1_regular');
    }
}
