<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisProgramDetail extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jenis_program_detail';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType    = \App\Entities\JenisProgramDetailEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_jenis_program', 'id_label', 'image_url', 'keterangan', 'content', 'created_at', 'updated_at'];

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
            'id_jenis_program' => [
                'label' => 'Jenis Program', 'rules' => 'required',
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
                    'label' => 'Image', 'rules' => 'required',
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
                        'label' => 'Image', 'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus berformat JPG atau PNG',
                        ],
                    ],
                ];
            }
            if ($imageValid['size'] > sizeImage()['size']) {
                $rules += [
                    'file_size' => [
                        'label' => 'Image', 'rules' => 'required',
                        'errors' => [
                            'required' => '{field} maksimal berukuran ' . sizeImage()['description'],
                        ],
                    ],
                ];
            }
        }
        // $rules += [
        //     'keterangan' => [
        //         'label' => 'Keterangan', 'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} tidak boleh kosong',
        //         ],
        //     ],
        // ];
        // $rules += [
        //     'content' => [
        //         'label' => 'Konten', 'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} tidak boleh kosong',
        //         ],
        //     ],
        // ];


        return $rules;
    }
}
