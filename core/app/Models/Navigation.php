<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    public function parent(){
    	return $this->hasOne(\App\Models\Navigation::class,'id','parent_id');
    }

    public function children(){
    	return $this->hasMany(\App\Models\Navigation::class,'parent_id','id');
    }
    
}
