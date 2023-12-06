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
                'judul' => 'Kampus 1 Plaza Festival',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'judul' => 'Kampus 2 Bakrie Tower',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'judul' => 'Sky Student Lounge',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'judul' => 'Creative Hub Teknik Informatika',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'judul' => 'Laboratorium Ilmu Politik',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'judul' => 'Laboratorium Ilmu Komunikasi',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'judul' => 'Laboratorium Teknik Sipil',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'judul' => 'Laboratorium Teknik Industri',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'judul' => 'Laboratorium Teknik Lingkungan',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'judul' => 'Laboratorium Komputer',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'judul' => 'Mini Office Accounting Lab.',
                'image_url' => 'default-fasilitas.png',
                'image_detail_url' => 'default-detail-fasilitas.png',
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
