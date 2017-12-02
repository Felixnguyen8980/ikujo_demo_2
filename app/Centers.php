<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centers extends Model
{
    //
    public function Courses(){
    	return $this->hasMany(Courses::class,'center_id','id');
    }

    public function newCourses($name){
    	$courses =new Courses();
    	$courses->name = $name;
    	$courses->center_id = $this->id;
        if (count ($courses->where('center_id',$this->id)->where('name',$name)->get()) ==0)
            $result = $courses->saveOrFail();
        else { 
            $result= false;
        }
        if ($result) {
            return "Saved/ Updated";
        } else {
            return "Fail to save/update";
        }
        
    }
}
