<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Setting as SettingModel;

class Setting extends Seeder
{
    public function run()
    {
        $data = [
            [
                'key' => 'telephone',
                'value'    => '(+62)8567772010',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'email',
                'value'    => 'admisi@bakrie.ac.id',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'logo',
                'value'    => 'default-logo.png',
                'created_at' => date('Y-m-d H:i:s')
            ],

        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('settings');
        $builder->ignore(true)->insertBatch($data);
    }
}
