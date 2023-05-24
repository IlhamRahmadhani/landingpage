<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banner extends Migration
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
        $this->forge->createTable('banners');
    }

    public function down()
    {
        $this->forge->dropTable('banners');
    }
}
