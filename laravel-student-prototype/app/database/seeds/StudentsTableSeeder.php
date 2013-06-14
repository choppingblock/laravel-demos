<?php

class StudentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('students')->delete();

		Student::create(array(
                        'id' => 1,
                        'first_name' => 'Mark',
                        'last_name' => 'Grodzki',
                        'email' => 'mark@grodzki.com',
                        'year_id' => 2,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
                
                Student::create(array(
                        'id' => 2,
                        'first_name' => 'Thomas',
                        'last_name' => 'Romer',
                        'email' => 'thomas@choppingblock.com',
                        'twitter' => '@chopshopstore',
                        'year_id' => 3,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
	}

}