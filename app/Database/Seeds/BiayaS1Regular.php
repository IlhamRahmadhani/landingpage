<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Banner as BannerModel;

class Fasilitas extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'id_jurusan' => '1',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'id_jurusan' => '2',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'id_jurusan' => '3',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'id_jurusan' => '4',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'id_jurusan' => '5',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'id_jurusan' => '6',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'id_jurusan' => '7',
                'biaya_gemilang' => '12800000',
                'biaya_per_semester' => '11430000',
                'total_biaya_4_tahun' => '92810000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'id_jurusan' => '8',
                'biaya_gemilang' => '12800000',
                'biaya_per_semester' => '11430000',
                'total_biaya_4_tahun' => '92810000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'id_jurusan' => '9',
                'biaya_gemilang' => '12800000',
                'biaya_per_semester' => '11430000',
                'total_biaya_4_tahun' => '92810000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'id_jurusan' => '10',
                'biaya_gemilang' => '12800000',
                'biaya_per_semester' => '10050000',
                'total_biaya_4_tahun' => '83150000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'id_jurusan' => '11',
                'biaya_gemilang' => '15257000',
                'biaya_per_semester' => '13730000',
                'total_biaya_4_tahun' => '111385000',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'id_jurusan' => '1',
                'biaya_gemilang' => '15257000',
                'biaya_per_semester' => '13730000',
                'total_biaya_4_tahun' => '111385000',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('biaya_s1_regular');
        $builder->ignore()->insertBatch($data);
    }
}
