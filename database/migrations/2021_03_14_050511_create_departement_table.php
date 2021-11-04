<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('departments', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('Department_Name',30);
        //     $table->string('Department_Head',30);
        //     $table->bigInteger('Total_Employee');
        //     $table->date('Created_Department');
        //     $table->string('Status',15);
        //     $table->timestamps();
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('departements');
    }
}
