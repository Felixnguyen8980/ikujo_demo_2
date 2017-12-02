<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->newUsers('ntnam8980@gmail.com','felixnguyen8980','Nam150596','1');
        $this->newUsers('ntnam8981@gmail.com','felixnguyen8981','Nam150596','2');
        $this->newUsers('ntnam8982@gmail.com','felixnguyen8982','Nam150596','3');
        $this->newUsers('ntnam8983@gmail.com','felixnguyen8983','Nam150596','2');
        $this->newUsers('ntnam8984@gmail.com','felixnguyen8984','Nam150596','3');

    }
    public function newUsers($email,$username,$password,$role){
    	$user = new App\Users;
    	$user->email = $email;
    	$user->username = $username;
    	$user->password = md5($password);
    	$user->roles_id = $role;
    	$user->save();
    }
}
