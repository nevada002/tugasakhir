<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_berita_acaras')->insert([
            [
                'id' => 1,
                'name' => 'Proses'
            ],
            [
                'id' => 2,
                'name' => 'Ditolak'
            ],
            [
                'id' => 3,
                'name' => 'Berhasil'
            ]
        ]);
        
    }
}
