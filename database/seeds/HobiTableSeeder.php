<?php

use Illuminate\Database\Seeder;

class HobiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Hobi::insert([
        	['nama_hobi' => 'Coding'],
        	['nama_hobi' => 'Swiming'],
        	['nama_hobi' => 'Hacking'],
        	['nama_hobi' => 'Running'],
        ]);
    }
}
