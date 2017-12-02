<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    public function Users(){
    	 return $this->hasMany(Users::class);
    }
}
