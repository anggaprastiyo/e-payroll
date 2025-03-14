<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'tempat_lahir'   => '',
                'no_ktp'         => '',
                'no_kk'          => '',
                'no_bpjstk'      => '',
                'no_bpjskes'     => '',
                'no_rekening'    => '',
                'nik'            => '',
            ],
        ];

        User::insert($users);
    }
}
