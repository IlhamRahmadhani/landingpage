<?php

namespace App\Controllers\Frontend;

use App\Repositories\BiayaRepository;
use App\Repositories\JenisProgramDetailRepository;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class FrontendController extends BaseController
{
    public function home()
    {
        $banner = model('Banner')->asArray()->findAll();
        $jenisProgram = model('JenisProgram')->asArray()->findAll();
        $jenisProgramDetail = (new JenisProgramDetailRepository())->getAll();
        $content = compact('banner', 'jenisProgram', 'jenisProgramDetail');
        return view('frontend/home', $content);
    }

    public function detailProgramSeleksi($id)
    {
        $detail = model('JenisProgramDetail')->asArray()->find($id);
        if (!$detail) {
            throw new PageNotFoundException();
        }
        $content = compact('detail');
        return view('frontend/detail_program_seleksi', $content);
    }

    public function prodi()
    {
        $prodi = model('Prodi')->asArray()->findAll();
        $content = compact('prodi');
        return view('frontend/prodi', $content);
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
        $biaya = $biayaRepository->getAll();
        $content = compact('biaya');
        return view('frontend/biaya', $content);
    }

    public function kontakKami()
    {
        $kontakKami = model('KontakKami')->asArray()->first();
        $content = compact('kontakKami');
        return view('frontend/kontak_kami', $content);
    }
}
