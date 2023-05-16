<?php

namespace Database\Seeders;

use App\Models\LupaPasswordModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LupaPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LupaPasswordModel::query()->create([
            'nip' => 12210778,
            'email' => 'aditya@gmail.com',
            'password_baru' => Hash::make('1234'),
            'nip_id' => 3
        ]);
    }
}
