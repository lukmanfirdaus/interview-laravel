<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Machine;

class MachineSeeder extends Seeder
{
    /**
     * bulk add to 20 machine
     *
     * @return void
     */
    public function run()
    {
    for ($i = 1; $i <= 20; $i++) {
        Machine::create([
            'name' => 'Machine ' . $i,
        ]);
    }
    }
}
