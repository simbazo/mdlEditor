<?php

namespace App\Models\Ngos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NgoType extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','user_creatd','user_updated','user_deleted'];

    public function ngo(){
    	return $this->hasMany(\App\Models\Ngos\Ngo::class,'uuid','ngo_type');
    }

    public function types(){
    	$types = $this->all();
    	$typeList = [];

    	foreach ($types as $key) {
    		$typeList[$key->uuid] = $key->name;
    	}

    	return $typeList;
    }
}
