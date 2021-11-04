<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('EmployeeID');
            // $table->string('name',30);
            // $table->integer('EmployeeID')->unique()->nullable();
            $table->string('EmployeeType',20)->nullable();
            $table->string('EmployeeName',30)->nullable();
            $table->string('EmployeePosition',30)->nullable();
            $table->string('Department',30)->nullable();
            $table->date('BirthDate')->nullable();
            $table->date('JoinDate')->nullable();
            // $table->string('ReportTo',30)->nullable();
            $table->string('email',30)->unique();
            $table->string('Phone',14)->unique()->nullable();
            $table->string('Photo')->nullable();
            $table->string('Address',255)->nullable();
            $table->string('City',30)->nullable();
            $table->string('Country',30)->nullable();
            $table->string('Postal_Code',10)->nullable();
            $table->string('TIN',15)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('AboutMe',255)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
