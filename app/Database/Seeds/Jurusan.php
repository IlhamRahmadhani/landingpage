<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Jurusan as JurusanModel;

class Jurusan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 'INF',
                'jurusan' => 'Informatika',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'SISINF',
                'jurusan' => 'Sistem Informasi',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'TEKIN',
                'jurusan' => 'Teknik Indsustri',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'TEKSIP',
                'jurusan' => 'Teknik Sipil',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'TEKPANG',
                'jurusan' => 'Teknologi Pangan',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'TEKLING',
                'jurusan' => 'Teknik Lingkungan',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'MAN',
                'jurusan' => 'Manajemen',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'HI',
                'jurusan' => 'Hubungan International',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'KEBPUB',
                'jurusan' => 'Kebijakan Publik',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'AKN',
                'jurusan' => 'Akuntansi',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 'ILKOM',
                'jurusan' => 'Ilmu Komunikasi',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('jurusan');
        $builder->ignore(true)->insertBatch($data);
    }
}
