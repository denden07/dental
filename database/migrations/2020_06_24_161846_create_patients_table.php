<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('dob');
            $table->unsignedInteger('age');
            $table->string('sex');
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('religion');
            $table->string('nationality');
            $table->string('address');
            $table->string('occupation');
            $table->string('dental_insurance');
            $table->date('effective_date');
            $table->string('guardian')->nullable();
            $table->string('gOccupation')->nullable();







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
        Schema::dropIfExists('patients');
    }
}
