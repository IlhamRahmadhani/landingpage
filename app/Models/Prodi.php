<?php

namespace App\Models;

use CodeIgniter\Model;

class Prodi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prodi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType    = \App\Entities\ProdiEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_jurusan', 'judul', 'image_url', 'image_detail_url', 'description', 'order', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function setRules($type = 'insert')
    {
        $rules = [];
        $rules += [
            'judul' => [
                'label' => 'Judul', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ],
            ],
        ];
        $isImageAvail = isset($_FILES['image_url']);
        $isImageAvail = $isImageAvail ? !empty($_FILES['image_url']['tmp_name']) : false;
        $imageValid = $isImageAvail ? $_FILES['image_url'] : null;

        if ($type == 'insert' && !$isImageAvail) {
            $rules += [
                'image_url' => [
                    'label' => 'Gambar Depan', 'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ],
                ],
            ];
        }
        if ($imageValid) {
            if (empty(strstr($imageValid['type'], 'image/'))) {
                $rules += [
                    'file_type' => [
                        'label' => 'Gambar Depan', 'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus berformat JPG atau PNG',
                        ],
                    ],
                ];
            }
            if ($imageValid['size'] > sizeImage()['size']) {
                $rules += [
                    'file_size' => [
                        'label' => 'Gambar Depan', 'rules' => 'required',
                        'errors' => [
                            'required' => '{field} maksimal berukuran '. sizeImage()['description'] ,
                        ],
                    ],
                ];
            }
        }

        $isImageDetailAvail = isset($_FILES['image_detail_url']);
        $isImageDetailAvail = $isImageDetailAvail ? !empty($_FILES['image_detail_url']['tmp_name']) : false;
        $imageDetailValid = $isImageDetailAvail ? $_FILES['image_detail_url'] : null;
        if ($type == 'insert' && !$isImageDetailAvail) {
            $rules += [
                'image_detail_url' => [
                    'label' => 'Gambar Modal', 'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ],
                ],
            ];
        }

        if ($imageDetailValid) {
            if (empty(strstr($imageDetailValid['type'], 'image/'))) {
                $rules += [
                    'file_type_detail' => [
                        'label' => 'Gambar Modal', 'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus berformat JPG atau PNG',
                        ],
                    ],
                ];
            }
            if ($imageDetailValid['size'] > sizeImage()['size']) {
                $rules += [
                    'file_size_detail' => [
                        'label' => 'Gambar Modal', 'rules' => 'required',
                        'errors' => [
                            'required' => '{field} maksimal berukuran '. sizeImage()['description'] ,
                        ],
                    ],
                ];
            }
        }

        return $rules;
    }
}
