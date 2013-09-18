<?php

class FilesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('images')->delete();

		\App\Models\Image::create(array(
            'id' => 1,
            'label' => 'Happy Kitten',
            'url' => 'uploads/happy-kitten.jpg',
            'description' => '',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
		));
                
        \App\Models\Image::create(array(
            'id' => 2,
            'label' => 'Kitten Fight',
            'url' => 'uploads/Kitten-pic-cute-kittens.jpg',
            'description' => '',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        \App\Models\Image::create(array(
            'id' => 3,
            'label' => 'Frog Hat',
            'url' => 'uploads/cutest-kitten-hat-ever.jpg',
            'description' => '',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
	}

}