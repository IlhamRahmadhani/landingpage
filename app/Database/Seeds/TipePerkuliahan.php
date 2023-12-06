<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\TipePerkuliahan as TipePerkuliahanModel;

class TipePerkuliahan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'tipe' => 'S1 Reguler',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'tipe' => 'S1 Kelas Karyawan',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'tipe' => 'Magister Manajemen',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'tipe' => 'Magister Ilmu Komunikasi',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('tipe_perkuliahan');
        foreach ($data as $k => $v) {
            $exist = $builder->where('tipe', $v['tipe'])->get()->getNumRows();
            if (!$exist)
                $builder->insert($v);
        }
    }
}
