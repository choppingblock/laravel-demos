<?php

use Illuminate\Database\Migrations\Migration;

class CreateStudentsYearsRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students', function($table) {
                $table->integer('year_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students', function($table) {
                $table->dropColumn('year_id');
        });
	}

}