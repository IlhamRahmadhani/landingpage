<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\KontakKamiEntity;

class KontakKamiController extends BaseController
{
    public function index()
    {
        $kontakKami = model('KontakKami')->asArray()->first();
        $content = compact('kontakKami');
        return view('backend/kontak-kami/index', $content);
    }
    public function save()
    {
        if ($this->request->is('post')) {
            $kontakKami = model('KontakKami')->asArray()->first();
            $post = [
                'content' => htmlentities($this->request->getPost('content') ?? ''),
            ];
            $isSave = 0;
            if (isset($kontakKami['id'])) {
                if (model('KontakKami')->update($kontakKami['id'], $post)) {
                    $isSave = 1;
                }
            } else {
                if (model('KontakKami')->insert($post)) {
                    $isSave = 1;
                }
            }
            $response = [];
            if ($isSave) {
                $response = [
                    'success' => true,
                    'message' => 'Berhasil merubah konten',
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
