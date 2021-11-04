<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave', function (Blueprint $table) {
            $table->id('LeaveID');
            $table->timestamps();
            $table->integer('EmployeeID');
            $table->date('Date_start');
            $table->date('Date_end');
            $table->string('Reason',50);
            $table->integer('TotalLeave')->default(12);
            $table->enum('Approval',['Waiting Approval','Accept','Reject']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave');
    }
}
