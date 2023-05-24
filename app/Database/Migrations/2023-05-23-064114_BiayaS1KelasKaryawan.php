<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BiayaS1KelasKaryawan extends Migration
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
            'semester_1' => [
                'type'  => 'BIGINT',
                'default' => 0
            ],
            'cicilan_1' => [
                'type'  => 'BIGINT',
                'default' => 0
            ],
            'semester_2' => [
                'type'  => 'BIGINT',
                'default' => 0
            ],
            'semester_3' => [
                'type'  => 'BIGINT',
                'default' => 0
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
        $this->forge->createTable('biaya_s1_kelas_karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('biaya_s1_kelas_karyawan');
    }
}
