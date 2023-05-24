<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SkemaPembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_tipe_perkuliahan' => [
                'type'  => 'VARCHAR',
                'constraint'    => '31',
            ],
            'banyak_cicilan' => [
                'type'  => 'INT',
            ],
            'cicilan_ke' => [
                'type'  => 'VARCHAR',
                'constraint' => '255',
            ],
            'besar_cicilan' => [
                'type'  => 'BIGINT',
                'default' => '0'
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
        $this->forge->addKey('id_tipe_perkuliahan', false);
        $this->forge->addKey('id', true);
        $this->forge->createTable('skema_pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('skema_pembayaran');
    }
}
