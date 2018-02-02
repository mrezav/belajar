<?php

use Illuminate\Database\Seeder;

class TeleponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Telepon::insert([
        	['id_siswa' => '1', 'nomor_telepon' => '08982293833'],
        	['id_siswa' => '3', 'nomor_telepon' => '08982293654'],
        	['id_siswa' => '4', 'nomor_telepon' => '08982296390'],
        	['id_siswa' => '5', 'nomor_telepon' => '08982293293'],
        ]);
    }
}
