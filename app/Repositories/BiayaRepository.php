<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class BiayaRepository extends BaseRepository
{

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

  public function getSkemaPembayaran()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('skema_pembayaran');
    $builder->select([
      'tipe_perkuliahan.tipe',
      'skema_pembayaran.*'
    ]);
    $builder->join('tipe_perkuliahan', 'tipe_perkuliahan.id = skema_pembayaran.id_tipe_perkuliahan');
    $builder->orderBy('skema_pembayaran.id_tipe_perkuliahan', 'asc');
    $builder->orderBy('skema_pembayaran.banyak_cicilan', 'desc');
    $builder->orderBy('skema_pembayaran.cicilan_ke', 'asc');
    $result = $builder->get()->getResultArray();

    $data = [];
    foreach ($result as $k => $v) {
      $data[$v['program']][] = $v;
    }
    return $data;
    return $result;
  }
}
