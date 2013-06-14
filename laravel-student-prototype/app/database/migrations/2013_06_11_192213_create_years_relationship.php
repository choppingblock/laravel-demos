<?php

use Illuminate\Database\Migrations\Migration;

class CreateYearsRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('years', function($table) {
                $table->integer('student_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('years', function($table) {
                $table->dropColumn('student_id');
        });
	}

}