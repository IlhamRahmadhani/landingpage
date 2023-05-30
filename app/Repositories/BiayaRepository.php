<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class BiayaRepository extends BaseRepository
{

  public function getAll()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('tipe_perkuliahan');
    $builder->select([
      'tipe_perkuliahan.id',
      'tipe_perkuliahan.tipe',
      'biaya.id as id_biaya',
      'biaya.id_tipe_perkuliahan',
      'biaya.content',
    ]);
    $builder->join('biaya', 'tipe_perkuliahan.id = biaya.id_tipe_perkuliahan', 'LEFT');
    $builder->orderBy('tipe_perkuliahan.id', 'asc');
    $builder->groupBy('tipe_perkuliahan.id');
    $result = $builder->get()->getResultArray();
    return $result;
  }

  public function get($id)
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('tipe_perkuliahan');
    $builder->select([
      'tipe_perkuliahan.tipe',
      'biaya.*',
      'biaya.id as id_biaya'
    ]);
    $builder->join('biaya', 'tipe_perkuliahan.id = biaya.id_tipe_perkuliahan', 'LEFT');
    $builder->orderBy('tipe_perkuliahan.id', 'asc');
    $builder->groupBy('tipe_perkuliahan.id');
    $builder->where('tipe_perkuliahan.id', $id);
    $result = $builder->get()->getRowArray();
    return $result;
  }

  public function getBiayaS1Regular()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('biaya_s1_regular');
    $builder->select([
      'jurusan.jurusan',
      'biaya_s1_regular.*'
    ]);
    $builder->join('jurusan', 'jurusan.id = biaya_s1_regular.id_jurusan');
    $builder->orderBy('jurusan.id', 'asc');
    $result = $builder->get()->getResultArray();
    return $result;
  }
  public function getBiayaS1KelasKaryawan()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('biaya_s1_kelas_karyawan');
    $builder->select([
      'jurusan.jurusan',
      'biaya_s1_kelas_karyawan.*'
    ]);
    $builder->join('jurusan', 'jurusan.id = biaya_s1_kelas_karyawan.id_jurusan');
    $builder->orderBy('jurusan.id', 'asc');
    $result = $builder->get()->getResultArray();
    return $result;
  }
}
