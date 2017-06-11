<?php

namespace App\Models\Ngos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NgoArea extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','user_created','user_updated','user_deleted'];

    public function areas(){
    	$areas = $this->all();
    	$areaList = [];

    	foreach ($areas as $key) {
    		$areaList[$key->uuid] = $key->name;
    	}

    	return $areaList;
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class,'user_created');
    }
}
