<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
class SkemaPembayaran extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'id_tipe_perkuliahan' => '3',
                'banyak_cicilan' => '4',
                'cicilan_ke' => 'Cicilan 1 (Daftar Ulang)',
                'besar_cicilan' => '13900000',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'id_tipe_perkuliahan' => '3',
                'banyak_cicilan' => '4',
                'cicilan_ke' => 'Cicilan 2-24',
                'besar_cicilan' => '15700000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'id_tipe_perkuliahan' => '3',
                'banyak_cicilan' => '24',
                'cicilan_ke' => 'Cicilan 1 (Daftar Ulang)',
                'besar_cicilan' => '8100000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'id_tipe_perkuliahan' => '3',
                'banyak_cicilan' => '24',
                'cicilan_ke' => 'Cicilan 2-24',
                'besar_cicilan' => '2300000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'id_tipe_perkuliahan' => '4',
                'banyak_cicilan' => '4',
                'cicilan_ke' => 'Cicilan 1 (Daftar Ulang)',
                'besar_cicilan' => '13900000',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6,
                'id_tipe_perkuliahan' => '4',
                'banyak_cicilan' => '4',
                'cicilan_ke' => 'Cicilan 2-24',
                'besar_cicilan' => '15700000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'id_tipe_perkuliahan' => '4',
                'banyak_cicilan' => '24',
                'cicilan_ke' => 'Cicilan 1 (Daftar Ulang)',
                'besar_cicilan' => '8100000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'id_tipe_perkuliahan' => '4',
                'banyak_cicilan' => '24',
                'cicilan_ke' => 'Cicilan 2-24',
                'besar_cicilan' => '2300000',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('skema_pembayaran');
        $builder->ignore(true)->insertBatch($data);
    }
}
