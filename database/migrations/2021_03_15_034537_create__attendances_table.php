<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('AttendanceID');
            // $table->string('EmployeeName')->nullable();
            // $table->string('EmployeePosition')->nullable();
            $table->integer('EmployeeID')->nullable();
            // $table->string('Departement')->nullable();
            $table->string('WorkType',20)->nullable();
            $table->string('Notes',40)->nullable();
            $table->timestamp('Check_In')->useCurrent()->nullable();
            $table->timestamp('Check_Out')->nullable();
            $table->string('Address_CheckIn')->nullable();
            $table->string('Address_CheckOut')->nullable();
            $table->string('Latitude_CheckIn')->nullable();
            $table->string('Longitude_CheckIn')->nullable();
            $table->string('Latitude_CheckOut')->nullable();
            $table->string('Longitude_CheckOut')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('attendances');
    }
}
