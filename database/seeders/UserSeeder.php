<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::query()->create([
            'nip' => 12210778,
            'nama_lengkap' => 'aditya',
            'jenis_kelamin' => 'L',
            'jabatan' => 'karyawan',
            'alamat' => 'rasau jaya',
            'no_hp' => 2321,
            'email' => 'aditya@gmail.com',
            'password' => Hash::make('123'),
            'nip_id' => 3
        ]);
    }
}
