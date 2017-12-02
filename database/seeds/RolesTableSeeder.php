<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->newRoles('Admins');
        $this->newRoles('Centers');
        $this->newRoles('Students');
    }
    public function newRoles($name)
    {
    	$role = new App\Roles;
    	$role->name = $name;
    	$role->save();
    	return true;
    }
}
