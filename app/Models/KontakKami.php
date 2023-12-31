<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakKami extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kontak_kami';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType    = \App\Entities\KontakKamiEntity::class;

    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['content', 'created_at', 'updated_at'];

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
}
