<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->string("f_name");
            $table->string("m_name");
            $table->string("l_name");
            $table->date("dob");
            $table->integer("id_number");
            $table->boolean("status");

            $table->string("email");
            $table->string("mobile");
            $table->string("image");
            $table->string("attach");
            $table->string("address");
            $table->boolean("evening_study");

            $table->integer('dep_id');//->references('id')->on('department');
            $table->integer('class_id');
            $table->integer('stage_id');
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
        Schema::dropIfExists('student');
    }
}
