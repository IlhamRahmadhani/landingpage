<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\BiayaEntity;
use App\Repositories\BiayaRepository;
use CodeIgniter\Exceptions\PageNotFoundException;

class BiayaController extends BaseController
{
    public function index()
    {
        $biaya = (new BiayaRepository())->getAll();
        $content = compact('biaya');
        return view('backend/biaya/index', $content);
    }
    public function save($idTipePerkuliahan)
    {
        if ($this->request->is('post')) {
            $biaya = (new BiayaRepository())->get($idTipePerkuliahan);
            if (!$biaya) {
                return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan']);
            }

            $post = [
                'id_tipe_perkuliahan' => $idTipePerkuliahan,
                'content' => htmlentities($this->request->getPost('content') ?? ''),
            ];

            $isSave = 0;
            if ($biaya['id_biaya']) {
                model('Biaya')->update($biaya['id_biaya'], $post);
                $isSave = 1;
            } else {
                model('Biaya')->insert($post);
                $isSave = 1;
            }
            $response = [];
            if ($isSave) {
                $response = [
                    'success' => true,
                    'message' => 'Berhasil merubah konten biaya',
                    'icon' => 'success'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Terdapat kesalahan saat menyimpan data',
                    'icon' => 'alert'

                ];
            }

            return $this->response->setJSON($response);
        }
    }
}
