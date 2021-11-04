<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('TeamName',30);
            $table->string('ProjectName',30);
            $table->date('ProjectStart');
            $table->date('ProjectEnd');
            $table->string('DeveloperName',30);
            $table->string('DocumentCreateBy',30);
            $table->string('ProjectManager',30);
            $table->string('Department',20);
            $table->string('Status',20);
            $table->string('DevelopmentProgress',30);
            $table->string('Note',40);
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
        Schema::dropIfExists('projects');
    }
}
