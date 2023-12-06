<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $countBanners = model('Banner')->get()->getNumRows();
        $countProgramSeleksi = model('JenisProgramDetail')->get()->getNumRows();
        $countFasilitas = model('Fasilitas')->get()->getNumRows();
        $countBiaya = model('Biaya')->get()->getNumRows();
        $count = [
            'banners' => $countBanners,
            'program_seleksi' => $countProgramSeleksi,
            'fasilitas' => $countFasilitas,
            'biaya' => $countBiaya,
        ];
        $content = compact('count');
        return view('backend/index', $content);
    }
}
