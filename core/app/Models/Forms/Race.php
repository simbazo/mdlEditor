<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Race extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','user_created','user_updated','user_deleted'];

    public function farmer(){
    	return $this->hasMany(\App\Models\Farms\Farmer::class,'uuid','race_id');
    }

    public function race(){
    	$race = $this->all();
    	$raceList = [];

    	foreach ($race as $key) {
    		$raceList[$key->uuid] = $key->name;
    	}

    	return $raceList;
    }
}
