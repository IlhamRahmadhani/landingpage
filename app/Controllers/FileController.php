<?php

namespace App\Controllers;

class FileController extends BaseController
{
    public function showImage($name)
    {
        try {
            $image = file_get_contents(WRITEPATH . 'uploads/' . $name);
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
