<?php

class ImagesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('images')->delete();

		\App\Models\Image::create(array(
            'id' => 1,
            'title' => 'Happy Kitten',
            'url' => 'uploads/happy-kitten.jpg',
            'description' => '',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
		));
                
        \App\Models\Image::create(array(
            'id' => 2,
            'title' => 'Kitten Fight',
            'url' => 'uploads/Kitten-pic-cute-kittens.jpg',
            'description' => '',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        \App\Models\Image::create(array(
            'id' => 3,
            'title' => 'Frog Hat',
            'url' => 'uploads/cutest-kitten-hat-ever.jpg',
            'description' => '',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
	}

}