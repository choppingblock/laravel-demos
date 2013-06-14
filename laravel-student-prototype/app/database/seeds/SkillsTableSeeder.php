<?php

class SkillsTableSeeder extends Seeder {

	public function run()
	{
                DB::table('skills')->delete();

		Skill::create(array(
                        'id' => 1,
                        'label' => 'illustration',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
                
                Skill::create(array(
                        'id' => 2,
                        'label' => 'design',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));

                Skill::create(array(
                        'id' => 3,
                        'label' => 'painting',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));

                Skill::create(array(
                        'id' => 4,
                        'label' => 'vector drawing',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));

                Skill::create(array(
                        'id' => 5,
                        'label' => 'plumbing',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
	}

}