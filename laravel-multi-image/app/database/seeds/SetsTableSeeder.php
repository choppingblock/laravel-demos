<?php

class SetsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('sets')->delete();

		Set::create(array(
            'id' => 1,
            'label' => 'Set A',
            'date' => null,
            'description' => '',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
		));

	}

}