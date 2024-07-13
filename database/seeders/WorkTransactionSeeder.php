<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkTransaction;

class WorkTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            WorkTransaction::create([
                'machine_id' => $i,
                'site_id' => $i,
                'block_id' => $i,
                'task_id' => $i,
                'uom_id' => $i,
                'start_time' => now(),
                'end_time' => now(),
                'fuel' => 50,
                'submitted_by' => 1,
                'check_by' => 1,
                'when_check' => now(),
                'verified_by' => 1,
                'status' => 'on duty',
                'reason' => 'Regular maintenance',
                'activity_id' => $i,
            ]);
        }
    }
}
