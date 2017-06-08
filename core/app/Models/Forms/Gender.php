<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','user_creatd','user_updated','user_deleted'];

    public function user(){
    	return $this->belongsTo(\App\Models\User::class,'user_created');
    }

    public function users(){
    	return $this->hasMany(\App\Models\User::class,'uuid','gender_id');
    }

    public function sponsor(){

    }

    public function farmer(){
    	return $this->hasMany(\App\Models\Farms\Farmer::class,'uuid','gender_id');
    }

    public function gender(){
        $gender = $this->all();
        $genderList = [];

        foreach ($gender as $key) {
            $genderList[$key->uuid] = $key->name;
        }

        return $genderList;
    }

}
