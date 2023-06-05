<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\BannerEntity;
use App\Models\Banner;

class BannersController extends BaseController
{
    public function index()
    {
        $banners = model("Banner")->asArray()->findAll();
        $content = compact('banners');
        return view('backend/banners/index', $content);
    }

    public function loadContent()
    {
        $banners = model("Banner")->asArray()->findAll();
        $content = compact('banners');
        $html = htmlentities(view('backend/banners/content', $content));
        $response = ['html' => $html];
        return $this->response->setJSON($response);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $rules = $this->mBanner->setRules();
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
                    'judul' => htmlentities($this->request->getPost('judul') ?? ''),
                    'image_url' => $imageUrl,
                ];
                if ($this->mBanner->insert($post)) {
                    $response = [
                        'success' => true,
                        'message' => 'Berhasil menambah data banner',
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
        $view = view('backend/banners/create');
        echo $view;
    }
    public function update($id)
    {
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $rules = $this->mBanner->setRules('update');
            $validation->setRules($rules);
            $errors = [];
            $response = [];
            if ($validation->withRequest($this->request)->run()) {
                $banner = $this->mBanner->where('id', $id)->first();
                $post = [
                    'judul' => htmlentities($this->request->getPost('judul') ?? ''),
                ];

                $image = $this->request->getFile('image_url');
                if ($image->isValid()) {
                    $newImageUrl = '';
                    if ($image->getSize() && !$image->hasMoved()) {
                        $newImageUrl = $image->getRandomName();
                        $image->move(WRITEPATH . 'uploads', $newImageUrl);
                        if (file_exists(WRITEPATH . 'uploads/' . $banner->image_url)) {
                            unlink(WRITEPATH . 'uploads/' . $banner->image_url);
                        }
                        if ($newImageUrl) {
                            $banner->image_url = $newImageUrl;
                            $post['image_url'] = $newImageUrl;
                        }
                    }
                }

                if ($this->mBanner->update($id, $post)) {
                    $response = [
                        'success' => true,
                        'message' => 'Berhasil merubah data banner',
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
        $banner = model('Banner')->where('id', $id)->asArray()->first();
        $content = compact('banner');
        $view = view('backend/banners/update', $content);
        echo $view;
    }
    public function delete($id)
    {
        if ($this->request->is('post')) {
            $banner = model('Banner')->where('id', $id)->asArray()->first();
            if (!$banner)
                return $this->response->setJSON(['success' => false, 'message' => 'Tidak ada data']);
            if (model('Banner')->delete($id)) {
                $imageUrl = WRITEPATH . 'uploads' . '/' . $banner['image_url'];
                if (file_exists($imageUrl)) {
                    unlink($imageUrl);
                }
                $response = [
                    'success' => true,
                    'message' => 'Berhasil menghapus data banner',
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
        $banner = model('Banner')->where('id', $id)->asArray()->first();
        $content = compact('banner');
        $view = view('backend/banners/delete', $content);
        echo $view;
    }
}
