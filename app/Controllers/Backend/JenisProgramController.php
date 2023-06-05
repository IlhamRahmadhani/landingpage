<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\JenisProgramEntity;
use App\Repositories\JenisProgramDetailRepository;

class JenisProgramController extends BaseController
{
    public function index()
    {

        $jenisProgram = model("JenisProgram")->asArray()->findAll();
        $jenisProgramDetail = (new JenisProgramDetailRepository())->getAll();
        $content = compact('jenisProgram', 'jenisProgramDetail');
        return view('backend/jenis-program/index', $content);
    }
}
