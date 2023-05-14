<?php

namespace Database\Seeders;

use App\Models\IzinModel;
use Illuminate\Database\Seeder;

class IzinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IzinModel::query()->create([
            'tgl_mulai' => '2000-02-12',
            'tgl_selesai' => '2000-03-12',
            'keterangan' => 'masuk',
            'file' => 'masuk'

            
        ]);
    }
}
