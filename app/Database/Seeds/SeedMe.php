<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedMe extends Seeder
{
    public function run()
    {
        $this->call('Setting');
        $this->call('User');
        $this->call('Jurusan');
        $this->call('TipePerkuliahan');
        $this->call('Banner');
        $this->call('Fasilitas');
        $this->call('SkemaPembayaran');
    }
}   
