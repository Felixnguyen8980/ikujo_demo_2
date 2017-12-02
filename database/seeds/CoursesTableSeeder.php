<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->newCourses('N5');
        $this->newCourses('N4');
        $this->newCourses('N3');
        $this->newCourses('N2');
        $this->newCourses('N1');
    }
    public function newCourses($name){
    	$Center = App\Centers::find(1);
    	$courses = new App\Courses;
    	$courses->name = $name;
    	$courses->center_id = $Center->id;
    	$courses->save();
    	return "saved";
    }
}
