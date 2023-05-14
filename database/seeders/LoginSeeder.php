<?php

namespace Database\Seeders;

use App\Models\LoginModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoginModel::query()->create([
            'nip' => 12210778,
            'password' => Hash::make('123')
        ]);
    }
}
