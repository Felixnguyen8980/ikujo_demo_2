<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    public function Centers(){
    	return $this->belongsTo(Centers::class,'center_id','id');
    }
    public function Lessons(){
    	return $this->hasMany(Lessons::class,'course_id','id');
    }
    public function newLessons($name){
    	$lesson = new Lessons;
    	$lesson->name = $name;
    	$lesson->course_id =$this->id;
        if ( count ($lesson->where('course_id',$this->id)->where('name',$name)->get())==0 )
            $result = $lesson->saveOrFail();
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
