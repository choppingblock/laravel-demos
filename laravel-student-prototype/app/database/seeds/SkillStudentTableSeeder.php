<?php

class SkillStudentTableSeeder extends Seeder {

	public function run()
	{
		DB::table('skill_student')->delete();

			Skill_Student::create(array(
                'id' => 1,
                'student_id' => 1,
                'skill_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));

            Skill_Student::create(array(
                'id' => 2,
                'student_id' => 1,
                'skill_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));

            Skill_Student::create(array(
                'id' => 3,
                'student_id' => 2,
                'skill_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
                

	}

}