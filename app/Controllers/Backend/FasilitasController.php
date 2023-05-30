<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\FasilitasEntity;

class FasilitasController extends BaseController
{
    public function index()
    {
        $fasilitas = model("Fasilitas")->asArray()->findAll();
        $content = compact('fasilitas');
        return view('backend/fasilitas/index', $content);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $rules = $this->mFasilitas->setRules();
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

                $imageDetail = $this->request->getFile('image_detail_url');
                $imageDetailUrl = '';
                if (!$imageDetail->hasMoved()) {
                    $imageDetailUrl = $imageDetail->getRandomName();
                    $imageDetail->move(WRITEPATH . 'uploads', $imageDetailUrl);
                }
                $post = [
                    'judul' => htmlentities($this->request->getPost('judul') ?? ''),
                    'image_url' => $imageUrl,
                    'image_detail_url' => $imageDetailUrl,
                ];
                if ($this->mFasilitas->insert($post)) {
                    $response = [
                        'success' => true,
                        'message' => 'Berhasil menambah data Fasilitas',
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

        $view = view('backend/fasilitas/create');
        echo $view;
    }

    public function update($id)
    {
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $rules = $this->mFasilitas->setRules('update');
            $validation->setRules($rules);
            $errors = [];
            $response = [];
            if ($validation->withRequest($this->request)->run()) {
                $fasilitas = $this->mFasilitas->where('id', $id)->first();
                $post = [
                    'judul' => $this->request->getPost('judul'),
                ];
                $image = $this->request->getFile('image_url');
                if ($image->isValid()) {
                    $newImageUrl = '';
                    if ($image->getSize() && !$image->hasMoved()) {
                        $newImageUrl = $image->getRandomName();
                        $image->move(WRITEPATH . 'uploads', $newImageUrl);
                        if (file_exists(WRITEPATH . 'uploads/' . $fasilitas->image_url)) {
                            unlink(WRITEPATH . 'uploads/' . $fasilitas->image_url);
                        }
                        if ($newImageUrl) {
                            $fasilitas->image_url = $newImageUrl;
                            $post['image_url'] = $newImageUrl;
                        }
                    }
                }
                $imageDetail = $this->request->getFile('image_detail_url');
                if ($imageDetail->isValid()) {
                    $newImageDetailUrl = '';
                    if ($imageDetail->getSize() && !$imageDetail->hasMoved()) {
                        $newImageDetailUrl = $imageDetail->getRandomName();
                        $imageDetail->move(WRITEPATH . 'uploads', $newImageDetailUrl);
                        if (file_exists(WRITEPATH . 'uploads/' . $fasilitas->image_detail_url)) {
                            unlink(WRITEPATH . 'uploads/' . $fasilitas->image_detail_url);
                        }
                        if ($newImageDetailUrl) {
                            $fasilitas->image_detail_url = $newImageDetailUrl;
                            $post['image_detail_url'] = $newImageDetailUrl;
                        }
                    }
                }

                if ($this->mFasilitas->update($id, $post)) {
                    $response = [
                        'success' => true,
                        'message' => 'Berhasil merubah data banner',
                        'icon' => 'success'
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Berhasil merubah data fasilitas',
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
        $fasilitas = model('Fasilitas')->where('id', $id)->asArray()->first();
        $content = compact('fasilitas');
        $view = view('backend/fasilitas/update', $content);
        echo $view;
    }

    public function delete($id)
    {
        if ($this->request->is('post')) {
            $fasilitas = model('Fasilitas')->where('id', $id)->asArray()->first();
            if (!$fasilitas)
                return $this->response->setJSON(['success' => false, 'message' => 'Tidak ada data']);

            if (model('Fasilitas')->delete($id)) {
                $imageUrl = WRITEPATH . 'uploads' . '/' . $fasilitas['image_url'];
                if (file_exists($imageUrl)) {
                    unlink($imageUrl);
                }
                $imageDetailUrl = WRITEPATH . 'uploads' . '/' . $fasilitas['image_detail_url'];
                if (file_exists($imageDetailUrl)) {
                    unlink($imageDetailUrl);
                }
                $response = [
                    'success' => true,
                    'message' => 'Berhasil menghapus data fasilitas',
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
        $fasilitas = model('Fasilitas')->where('id', $id)->asArray()->first();
        $content = compact('fasilitas');
        $view = view('backend/fasilitas/delete', $content);
        echo $view;
    }
}
