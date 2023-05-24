<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Banner as BannerModel;

class Banner extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'judul' => 'Experience The Real Things',
                'image_url' => 'default-banner.png',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        foreach ($data as $k => $v) {
            $exist = $builder->where('judul', $v['judul'])->get()->getNumRows();
            if (!$exist)
                $builder->insert($v);
        }
    }
}
