<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [['name' => 'admin', 'guard_name' => 'web'], ['name' => 'petugas', 'guard_name' => 'web']];

        foreach($roles as $v) {
            Role::create(['name' => $v['name'], 'guard_name' => 'web']);
        }
    }
}
