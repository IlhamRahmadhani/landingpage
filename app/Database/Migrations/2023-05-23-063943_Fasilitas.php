<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fasilitas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'judul' => [
                'type'  => 'VARCHAR',
                'constraint'    => '255',
                'null'  => true,
            ],
            'image_url' => [
                'type'  => 'TEXT',
            ],
            'image_detail_url' => [
                'type'  => 'TEXT',
                'null' => true,
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
        $this->forge->createTable('fasilitas');
    }

    public function down()
    {
        $this->forge->dropTable('fasilitas');
    }
}
