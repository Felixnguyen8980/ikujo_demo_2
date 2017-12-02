<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    //
    public function Users(){
    	return $this->belongsTo(Users::class);
    }
}
