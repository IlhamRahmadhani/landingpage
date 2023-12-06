<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User as UserModel;

class User extends Seeder
{
    public function run()
    {
        $plain = 'asd';
        $password  = password_hash($plain, PASSWORD_BCRYPT);

        $data = [
            'username' => 'admin',
            'password'    => $password,
            'name'    => 'Admin',
            'email'    => 'ilham.rahmadhani@bakrie.ac.id',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->ignore(true)->insert($data);
    }
}
