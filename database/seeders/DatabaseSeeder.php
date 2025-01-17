<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            UserSeeder::class,
            MachineSeeder::class,
            SiteSeeder::class,
            UomSeeder::class,
            TaskSeeder::class,
            BlockSeeder::class,
            ActivitySeeder::class,
            WorkTransactionSeeder::class,
        ]);
    }
}
