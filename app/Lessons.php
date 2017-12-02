<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    //
    public function Courses(){
    	return $this->belongsTo(Courses::class,'course_id','id');
    }
}
