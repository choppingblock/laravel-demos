<?php

use Illuminate\Database\Migrations\Migration;

class CreateSkillStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skill_student', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('skill_id')->unsigned();
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
		Schema::drop('skill_student');
	}

}