<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks');
            $table->foreignId('machine_id')->constrained('machines');
            $table->foreignId('site_id')->constrained('sites');
            $table->foreignId('uom_id')->constrained('uoms');
            $table->foreignId('block_id')->constrained('blocks');
            $table->foreignId('activity_id')->constrained('activities');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('fuel');
            $table->foreignId('submitted_by')->constrained('users');
            $table->foreignId('check_by')->constrained('users');
            $table->datetime('when_check');
            $table->foreignId('verified_by')->constrained('users');
            $table->string('status');
            $table->string('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_transactions');
    }
};
