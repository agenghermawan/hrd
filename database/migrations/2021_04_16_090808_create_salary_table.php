<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary', function (Blueprint $table) {
            $table->increments('SalaryID');
            $table->string('EmployeeID');
            $table->bigInteger('NoAccount');
            $table->string('Bank',20);
            $table->integer('GajiPokok');
            $table->integer('Tunjangan');
            $table->integer('Tax')->default(2);
            $table->integer('Total');
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
        Schema::dropIfExists('salary');
    }
}
