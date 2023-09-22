<?php

namespace App\Controllers;

class FileController extends BaseController
{
    public function showImage($name, $tipe = null)
    {
        

        try {
            if ($tipe == 'prodi') {
                $image = file_get_contents(base_url() . 'frontend/assets/images/prodi/' . $name);
            } else {
                $image = file_get_contents(WRITEPATH . 'uploads/' . $name);
            }
        } catch (\Throwable $th) {
            $image = file_get_contents(FCPATH . 'global/' . 'no-image.png');
        }

        $mimeType = 'image/jpg';
        $this->response
            ->setStatusCode(200)
            ->setContentType($mimeType)
            ->setBody($image)
            ->send();
    }
}
