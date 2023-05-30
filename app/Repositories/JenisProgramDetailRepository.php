<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\Codeigniter4Adapter;

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

  public function getDt()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('jenis_program_detail');
    $builder->select('id, image_url, keterangan, content');
    $datatables = new Datatables(new Codeigniter4Adapter);
    $datatables->query($builder);


    return $datatables->generate()->toJson();
  }
}
