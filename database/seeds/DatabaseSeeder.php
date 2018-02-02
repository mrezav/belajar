<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HobiTableSeeder::class);
        $this->call(TeleponTableSeeder::class);
        // factory(\App\Models\Telepon::class,3)->create();
    }
}
