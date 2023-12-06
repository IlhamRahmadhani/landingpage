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
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'id_jurusan' => '2',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'id_jurusan' => '3',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'id_jurusan' => '4',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'id_jurusan' => '5',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'id_jurusan' => '6',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '11700000',
                'biaya_per_semester' => '10330000',
                'total_biaya_4_tahun' => '84010000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'id_jurusan' => '7',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '12800000',
                'biaya_per_semester' => '11430000',
                'total_biaya_4_tahun' => '92810000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'id_jurusan' => '8',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '12800000',
                'biaya_per_semester' => '11430000',
                'total_biaya_4_tahun' => '92810000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'id_jurusan' => '9',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '12800000',
                'biaya_per_semester' => '11430000',
                'total_biaya_4_tahun' => '92810000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'id_jurusan' => '10',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '12800000',
                'biaya_per_semester' => '10050000',
                'total_biaya_4_tahun' => '83150000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'id_jurusan' => '11',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '15257000',
                'biaya_per_semester' => '13730000',
                'total_biaya_4_tahun' => '111385000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'id_jurusan' => '1',
                'id_tipe_perkuliahan' => '1',
                'biaya_gemilang' => '15257000',
                'biaya_per_semester' => '13730000',
                'total_biaya_4_tahun' => '111385000',
                'semester_1' => '',
                'semester_cicilan_1' => '',
                'semester_2' => '',
                'semester_3' => '',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'judul' => 'Perpustakaan Universitas Bakrie',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('fasilitas');
        foreach ($data as $k => $v) {
            $exist = $builder->where('judul', $v['judul'])->get()->getNumRows();
            if (!$exist)
                $builder->insert($v);
        }
    }
}
