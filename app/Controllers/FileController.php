<?php

namespace App\Controllers;

class FileController extends BaseController
{
    public function showImage($name, $tipe = null)
    {
        $stream_context = stream_context_create([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false
            ]
        ]);

        try {
            if ($tipe == 'prodi') {
                $image = file_get_contents(base_url() . 'frontend/assets/images/prodi/' . $name, false, $stream_context);
                
            } else {
                $image = file_get_contents(WRITEPATH . 'uploads/' . $name, false, $stream_context);
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
