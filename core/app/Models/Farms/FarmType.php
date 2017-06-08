<?php

namespace App\Models\Farms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmType extends Model
{
   use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','user_created','user_updated','user_deleted'];

    public function farm(){
    	return $this->hasMany(\App\Models\Farms\Farm::class,'uuid','farm_type_id');
    }

    public function farmtype(){
    	$farmtype = $this->all();
    	$farmtypeList = [];

    	foreach ($farmtype as $key) {
    		$farmtypeList[$key->uuid]	= $key->name;
    	}

    	return $farmtypeList;
    }
}
