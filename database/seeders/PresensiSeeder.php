<?php

namespace Database\Seeders;

use App\Models\PresensiModel;
use Illuminate\Database\Seeder;

class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PresensiModel::query()->create([
            'waktu_masuk' => '2023-05-14 18:43:00',
            'waktu_tengah' => '2023-05-14 18:22:00',
            'waktu_pulang' => '2023-05-14 18:50:00',
            'alamat_ip' => '127.0.0.1',
            'lokasi' => '0.42086969871874336, 109.21069138056284',
        ]);
    }
}
