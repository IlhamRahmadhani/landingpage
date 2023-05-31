<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\JenisProgramDetailEntity;
use App\Entities\JenisProgramEntity;
use App\Repositories\JenisProgramDetailRepository;

class JenisProgramDetailController extends BaseController
{
    public function create($idJenisProgram)
    {
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $rules = $this->mJenisProgramDetail->setRules();
            $validation->setRules($rules);
            $errors = [];
            $response = [];

            if ($validation->withRequest($this->request)->run()) {
                $image = $this->request->getFile('image_url');
                $imageUrl = '';
                if (!$image->hasMoved()) {
                    $imageUrl = $image->getRandomName();
                    $image->move(WRITEPATH . 'uploads', $imageUrl);
                }
                $post = [
                    'id_jenis_program' => $this->request->getPost('id_jenis_program'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'image_url' => $imageUrl,
                    'content' => htmlentities($this->request->getPost('content') ?? ''),
                ];

                if ($this->mJenisProgramDetail->insert($post)) {
                    $response = [
                        'success' => true,
                        'message' => 'Berhasil menambah data program seleksi',
                        'icon' => 'success'
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Terdapat kesalahan saat menyimpan data',
                        'icon' => 'alert'
                    ];
                }
            } else {
                $errors += $validation->getErrors();
                $response = [
                    'success' => false,
                    'message' => 'Mohon periksa pesan di atas form',
                    'icon' => 'alert',
                    'form-error' => $errors,
                    'alert' => alert('error', $errors)
                ];
            }
            return $this->response->setJSON($response);
        }
        $content = compact('idJenisProgram');
        $view = view('backend/jenis-program-detail/create', $content);
        echo $view;
    }
    public function update($id)
    {
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $rules = $this->mJenisProgramDetail->setRules('update');
            $validation->setRules($rules);
            $errors = [];
            $response = [];
            if ($validation->withRequest($this->request)->run()) {
                $id = $this->request->getPost('id');
                $jenisProgramDetail = $this->mJenisProgramDetail->where('id', $id)->first();
                $post = [
                    'keterangan' => $this->request->getPost('keterangan'),
                    'content' => htmlentities($this->request->getPost('content') ?? ''),
                ];
                $image = $this->request->getFile('image_url');
                if ($image->isValid()) {
                    $newImageUrl = '';
                    if ($image->getSize() && !$image->hasMoved()) {
                        $newImageUrl = $image->getRandomName();
                        $image->move(WRITEPATH . 'uploads', $newImageUrl);
                        if (file_exists(WRITEPATH . 'uploads/' . $jenisProgramDetail->image_url)) {
                            unlink(WRITEPATH . 'uploads/' . $jenisProgramDetail->image_url);
                        }
                        if ($newImageUrl) {
                            $jenisProgramDetail->image_url = $newImageUrl;
                            $post['image_url'] = $newImageUrl;
                        }
                    }
                }
                if ($this->mJenisProgramDetail->update($id, $post)) {
                    $response = [
                        'success' => true,
                        'message' => 'Berhasil merubah data program seleksi',
                        'icon' => 'success'
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Terdapat kesalahan saat menyimpan data',
                        'icon' => 'alert'
                    ];
                }
            } else {
                $errors += $validation->getErrors();
                $response = [
                    'success' => false,
                    'message' => 'Mohon periksa pesan di atas form',
                    'icon' => 'alert',
                    'form-error' => $errors,
                    'alert' => alert('error', $errors)
                ];
            }
            return $this->response->setJSON($response);
        }
        $jenisProgramDetail = model('JenisProgramDetail')->where('id', $id)->asArray()->first();
        $content = compact('jenisProgramDetail');
        $view = view('backend/jenis-program-detail/update', $content);
        echo $view;
    }
    public function delete($id)
    {
        if ($this->request->is('post')) {
            $jenisProgramDetail = model('JenisProgramDetail')->where('id', $id)->asArray()->first();
            if (!$jenisProgramDetail)
                return $this->response->setJSON(['success' => false, 'message' => 'Tidak ada data']);
            $imagePath = WRITEPATH . 'uploads/' . $jenisProgramDetail['image_url'];
            if (model('JenisProgramDetail')->delete($id)) {
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $response = [
                    'success' => true,
                    'message' => 'Berhasil menghapus data program seleksi',
                    'icon' => 'success'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Terdapat kesalahan saat menghapus data',
                    'icon' => 'alert'
                ];
            }
            return $this->response->setJSON($response);
        }
        $jenisProgramDetail = model('JenisProgramDetail')->where('id', $id)->asArray()->first();
        $content = compact('jenisProgramDetail');
        $view = view('backend/jenis-program-detail/delete', $content);
        echo $view;
    }
}
