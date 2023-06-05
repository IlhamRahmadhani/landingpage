<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class JenisProgramDetailRepository extends BaseRepository
{

  public function getAll()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('jenis_program');
    $builder->select([
      'jenis_program.id',
      'program',
      'jenis_program_detail.id as id_pilihan',
      'jenis_program_detail.image_url',
      'jenis_program_detail.keterangan',
      'content'
    ]);
    $builder->join('jenis_program_detail', 'jenis_program.id = jenis_program_detail.id_jenis_program');
    $builder->orderBy('id', 'asc');
    $builder->orderBy('id_pilihan', 'asc');
    $result = $builder->get()->getResultArray();

    $data = [];
    foreach ($result as $k => $v) {
      $data[$v['program']][] = $v;
    }
    return $data;
  }
  public function get($idJenisProgram)
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('jenis_program');
    $builder->select([
      'jenis_program.id',
      'program',
      'jenis_program_detail.id as id_pilihan',
      'jenis_program_detail.image_url',
      'jenis_program_detail.keterangan',
      'content'
    ]);
    $builder->join('jenis_program_detail', 'jenis_program.id = jenis_program_detail.id_jenis_program');
    $builder->orderBy('id', 'asc');
    $builder->orderBy('id_pilihan', 'asc');
    $builder->where('jenis_program.id', $idJenisProgram);
    $result = $builder->get()->getResultArray();

    return $result;
  }
}
