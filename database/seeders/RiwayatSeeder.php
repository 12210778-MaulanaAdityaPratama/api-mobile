<?php

namespace Database\Seeders;

use App\Models\RiwayatModel;
use Illuminate\Database\Seeder;

class RiwayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RiwayatModel::query()->create([
            'jmlh_hdir_tptwktu' => 14,
            'jmlh_tidak_hadir' => 9,
            'jmlh_telat' => 2


        ]);
    }
}
