<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class SettingController extends BaseController
{
    public function index()
    {
        return view('backend/settings/index');
    }

    public function save()
    {
        $post = $this->request->getPost();
        $model = model('Setting');
        foreach ($post as $field => $value) {
            $setting = $model->where('key', $field)->first();
            if ($setting) {
                $model->update(['key', $field], ['value' => $value]);
            } else {
                $model->insert(['key' => $field, 'value' => $value]);
            }
        }

        $response = [
            'success' => true,
            'message' => 'Berhasil merubah data',
            'icon' => 'success'
        ];

        return $this->response->setJSON($response);
    }
}
