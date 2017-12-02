<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    public function Roles(){
    	return $this->belongsTo(Roles::class,'roles_id','id');
    }
    public function Admins(){
    	if($this->roles_id == 1){
    		return $this->hasOne(Admins::class,'user_id','id');
    	} 
    	return null;
    }
    public function Centers(){
    	if($this->roles_id == 2){
    		return $this->hasOne(Centers::class,'user_id','id');
    	} 
    	return null;
    }
    public function Students(){
    	if($this->roles_id == 3){
    		return $this->hasOne(Students::class,'user_id','id');
    	} 
    	return null;
    }

    public function save(array $options = []){
    	parent::save($options);
    	if($this->Students()!=null){
    		$students = new Students();
    		$this->Students()->save($students);
    	}
    	if($this->Centers()!=null){
    		$centers = new Centers();
    		$this->Centers()->save($centers);
    	}
    	if($this->Admins()!=null){
    		$admins = new Admins();
    		$this->Admins()->save($admins);
    	}
    	
    }

    public function login($username,$password){    
        $user = Users::where('username',$username)->where('password',$password)->distinct()->get();
        if ( count($user) > 0)
            return $user[0];
        return null;
    }
}
