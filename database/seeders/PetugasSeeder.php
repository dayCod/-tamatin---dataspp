<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => '123123',
                'nama_petugas' => 'admin',
                'level' => 'admin',
            ],
            [
                'username' => 'petugas',
                'password' => '123123',
                'nama_petugas' => 'petugas',
                'level' => 'petugas',
            ],
        ];

        foreach($data as $v) {
            $petugas = Petugas::create([
                'username' => $v['username'],
                'password' => bcrypt($v['password']),
                'nama_petugas' => $v['nama_petugas'],
                'level' => $v['level']
            ]);

            $petugas['level'] == 'admin' ? $petugas->assignRole('admin') : $petugas->assignRole('petugas');
        }
    }
}
