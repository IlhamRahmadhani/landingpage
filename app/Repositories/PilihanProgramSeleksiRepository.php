<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class PilihanProgramSeleksiRepository extends BaseRepository
{

  public function getAll()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('jenis_program');
    $builder->select([
      'jenis_program.id',
      'program',
      'pilihan_program_seleksi.id as id_pilihan',
      'pilihan_program_seleksi.image_url',
      'pilihan_program_seleksi.keterangan',
      'content'
    ]);
    $builder->join('pilihan_program_seleksi', 'jenis_program.id = pilihan_program_seleksi.id_jenis_program');
    $builder->orderBy('id', 'asc');
    $builder->orderBy('id_pilihan', 'asc');
    $result = $builder->get()->getResultArray();

    $data = [];
    foreach ($result as $k => $v) {
      $data[$v['program']][] = $v;
    }
    return $data;
  }
}
