<?php

namespace App\Controllers;

use App\Models\Banner;
use App\Repositories\BiayaRepository;
use App\Repositories\PilihanProgramSeleksiRepository;

class FrontendController extends BaseController
{
    public function home()
    {
        $banner = model('Banner')->asArray()->findAll();
        $pilihanProgramSeleksi = (new PilihanProgramSeleksiRepository())->getAll();
        $content = compact('banner', 'pilihanProgramSeleksi');
        return view('frontend/home', $content);
    }

    public function detailProgramSeleksi($id)
    {
        $detail = model('PilihanProgramSeleksi')->asArray()->find($id);
        $content = compact('detail');
        return view('frontend/detail_program_seleksi', $content);
    }

    public function fasilitas()
    {
        $fasilitas = model('Fasilitas')->asArray()->findAll();
        $content = compact('fasilitas');
        return view('frontend/fasilitas', $content);
    }

    public function biaya()
    {
        $biayaRepository = new BiayaRepository();
        $biayaS1Regular = $biayaRepository->getBiayaS1Regular();
        $biayaS1KelasKaryawan = $biayaRepository->getBiayaS1KelasKaryawan();
        $skemaPembayaran = $biayaRepository->getSkemaPembayaran();
        $content = compact('biayaS1Regular', 'biayaS1KelasKaryawan');
        return view('frontend/biaya', $content);
    }

    public function kontakKami()
    {
        return view('frontend/kontak_kami');
    }
}
