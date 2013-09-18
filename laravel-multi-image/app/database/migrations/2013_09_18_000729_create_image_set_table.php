<?php

use Illuminate\Database\Migrations\Migration;

class CreateImageSetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image_set', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->integer('set_id')->unsigned();
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
		Schema::drop('image_set');
	}

}