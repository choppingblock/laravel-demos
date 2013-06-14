<?php

class YearsTableSeeder extends Seeder {

	public function run()
	{
                DB::table('years')->delete();

		Year::create(array(
                        'id' => 1,
                        'label' => '2002',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
                
                Year::create(array(
                        'id' => 2,
                        'label' => '2003',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));

                Year::create(array(
                        'id' => 3,
                        'label' => '2004',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));

                Year::create(array(
                        'id' => 4,
                        'label' => '2005',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
	}

}