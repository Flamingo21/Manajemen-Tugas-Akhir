<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DospemsSeeder::class);
        $this->call(PrasemprosSeeder::class);
        $this->call(PrasemhasSeeder::class);
        $this->call(PrasidangSeeder::class);
    }
}
